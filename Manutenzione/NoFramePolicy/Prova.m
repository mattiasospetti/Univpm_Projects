%% Istanziazione Variabili

T=struct2table(Sequence,"AsArray",true);
Topics=struct2table(T.Topics,"AsArray",true);
Imu_data=Topics.mavros_imu_data_raw{1};
Acceleration=Imu_data.linear_acceleration;
Angular_Velocity=Imu_data.angular_velocity;
Imu_mag=Topics.mavros_imu_mag{1};
Mag=Imu_mag.magnetic_field;
Velox=Topics.mavros_nav_info_velocity{1};
Pressure=Topics.mavros_imu_atm_pressure{1};
Local_Pos=Topics.mavros_local_position_pose{1};
Position=Local_Pos.pose;
Wind=Topics.mavros_wind_estimation{1};
twist=Wind.twist;
Temperature=Topics.mavros_imu_temperature{1};
Roll=Topics.mavros_nav_info_roll{1};
Pitch=Topics.mavros_nav_info_pitch{1};
Yaw=Topics.mavros_nav_info_yaw{1};
Rc_out=Topics.mavros_rc_out{1}.channels;
Errors=Topics.mavros_nav_info_errors{1};

Exist_Column = strcmp('failure_status_engines',Topics.Properties.VariableNames);
valEngines = Exist_Column(Exist_Column==1);

Failures=0;
flag=0;

%% Tempo
time_ref=Topics.mavros_time_reference{1};

array=size(Topics.mavros_nav_info_pitch{1},[1]);

matrice=zeros(array,41);
size_time=size(time_ref,[1]);

vettore={};
t={};

tempo = milliseconds(0);
vettore= [vettore, tempo];

for n=1:size_time

    %secondi=datetime(time_ref.time_ref(n).secs,'convertfrom','posixtime', 'Format', 'yyyy-MM-dd HH:mm:ss.SSS');
    tempo = tempo + milliseconds((time_ref.time_ref(n).nsecs)/1000000);

    vettore=[vettore,tempo];

end

vettore=vettore.';

passo=time2num(vettore(size_time)-vettore(1),"seconds")/array;

for n=1:array
    aggiunta=seconds(passo*(n-1));
    t=[t,vettore(1)+aggiunta];
end

timestamp=t.';

%% Fault Code 
%Failures=Topics.failure_status_aileron{1};
faultCode = [0];
%faultCode = table2array(Failures(1,2))+4;
faultCode = array2table(faultCode);
%% Acceleraziione
for n=1:size(Acceleration,[1])

    %calcolo dove mettere
    passo=array/size(Acceleration,[1]);

    matrice(round(passo*n),1)=Acceleration(n).x;


    if matrice(round(passo*n)-1,1)==0
        matrice(round(passo*n)-1,1)=Acceleration(n).x;
    end

    matrice(round(passo*n),2)=Acceleration(n).y;

    if matrice(round(passo*n)-1,2)==0
        matrice(round(passo*n)-1,2)=Acceleration(n).y;
    end

    matrice(round(passo*n),3)=Acceleration(n).z;

    if matrice(round(passo*n)-1,3)==0
        matrice(round(passo*n)-1,3)=Acceleration(n).z;
    end

    matrice(round(passo*n),4)=Angular_Velocity(n).x;

    if matrice(round(passo*n)-1,4)==0
        matrice(round(passo*n)-1,4)=Angular_Velocity.x;
    end

    matrice(round(passo*n),5)=Angular_Velocity(n).y;

    if matrice(round(passo*n)-1,5)==0
        matrice(round(passo*n)-1,5)=Angular_Velocity(n).y;
    end

    matrice(round(passo*n),6)=Angular_Velocity(n).z;

    if matrice(round(passo*n)-1,6)==0
        matrice(round(passo*n)-1,6)=Angular_Velocity(n).z;
    end

    matrice(round(passo*n),7)=Mag(n).x;

    if matrice(round(passo*n)-1,7)==0
        matrice(round(passo*n)-1,7)=Mag(n).x;
    end

    matrice(round(passo*n),8)=Mag(n).y;

    if matrice(round(passo*n)-1,8)==0
        matrice(round(passo*n)-1,8)=Mag(n).y;
    end

    matrice(round(passo*n),9)=Mag(n).z;

    if matrice(round(passo*n)-1,9)==0
        matrice(round(passo*n)-1,9)=Mag(n).z;
    end

end
TT=timetable(timestamp, matrice(:,1));
TT=renamevars(TT,["Var1"],["acc_x"]);
TT2=timetable(timestamp,matrice(:,2));
TT3=timetable(timestamp,matrice(:,3));
TT4=timetable(timestamp,matrice(:,4));
TT5=timetable(timestamp,matrice(:,5));
TT6=timetable(timestamp,matrice(:,6));
TT7=timetable(timestamp,matrice(:,7));
TT8=timetable(timestamp,matrice(:,8));
TT9=timetable(timestamp,matrice(:,9));

%% Velox
for n=2:size(Velox,[1])

    passo=array/size(Velox,[1]);

    matrice(round(passo*n),10)=table2array(Velox(n,3));

    matrice(round(passo*n)-1,10)=table2array(Velox(n,3));

    matrice(round(passo*n),11)=table2array(Velox(n,4));

    matrice(round(passo*n)-1,11)=table2array(Velox(n,4));

    matrice(round(passo*n),12)=table2array(Velox(n,5));

    matrice(round(passo*n)-1,12)=table2array(Velox(n,5));

    matrice(round(passo*n),13)=table2array(Velox(n,7));

    matrice(round(passo*n)-1,13)=table2array(Velox(n,7));

    matrice(round(passo*n),14)=table2array(Velox(n,8));

    matrice(round(passo*n)-1,14)=table2array(Velox(n,8));

    matrice(round(passo*n),15)=table2array(Velox(n,9));

    matrice(round(passo*n)-1,15)=table2array(Velox(n,9));

end
TT10=timetable(timestamp, matrice(:,10));
TT11=timetable(timestamp, matrice(:,11));
TT12=timetable(timestamp, matrice(:,12));
TT13=timetable(timestamp, matrice(:,13));
TT14=timetable(timestamp, matrice(:,14));
TT15=timetable(timestamp, matrice(:,15));

%% Pressure 

for n=1:size(Pressure,[1])
    passo=array/size(Pressure,[1]);
    matrice(round(passo*n),16)=table2array(Pressure(n,1));
    matrice(round(passo*n)-1,16)=table2array(Pressure(n,1));
end

TT16=timetable(timestamp, matrice(:,16));

%% Position

for n=1:size(Position,[1])
    passo=array/size(Position,[1]);
    matrice(round(passo*n),17)=Position(n).position.x;

    matrice(round(passo*n)-1,17)=Position(n).position.x;
    matrice(round(passo*n)-2,17)=Position(n).position.x;
    matrice(round(passo*n)-3,17)=Position(n).position.x;
    if round(passo*n)-4>0
        if matrice(round(passo*n)-4,17)==0
            matrice(round(passo*n)-4,17)=Position(n).position.x;
        end
    end

    matrice(round(passo*n),18)=Position(n).position.y;
    matrice(round(passo*n)-1,18)=Position(n).position.y;
    matrice(round(passo*n)-2,18)=Position(n).position.y;
    matrice(round(passo*n)-3,18)=Position(n).position.y;
    if round(passo*n)-4>0
        if matrice(round(passo*n)-4,18)==0
            matrice(round(passo*n)-4,18)=Position(n).position.y;
        end
    end
    matrice(round(passo*n),19)=Position(n).position.z;
    matrice(round(passo*n)-1,19)=Position(n).position.z;
    matrice(round(passo*n)-2,19)=Position(n).position.z;
    matrice(round(passo*n)-3,19)=Position(n).position.z;
    if round(passo*n)-4>0
        if matrice(round(passo*n)-4,19)==0
            matrice(round(passo*n)-4,19)=Position(n).position.z;
        end
    end
end

TT17=timetable(timestamp, matrice(:,17));
TT18=timetable(timestamp, matrice(:,18));
TT19=timetable(timestamp, matrice(:,19));

%% Wind 
for n=1:size(Wind,[1])
    passo=array/size(Wind,[1]);
    matrice(round(passo*n),20)=twist(n).linear.x;

    matrice(round(passo*n)-1,20)=twist(n).linear.x;
    matrice(round(passo*n)-2,20)=twist(n).linear.x;
    matrice(round(passo*n)-3,20)=twist(n).linear.x;
    matrice(round(passo*n)-4,20)=twist(n).linear.x;
    matrice(round(passo*n)-5,20)=twist(n).linear.x;
    matrice(round(passo*n)-6,20)=twist(n).linear.x;
    matrice(round(passo*n)-7,20)=twist(n).linear.x;
    matrice(round(passo*n)-8,20)=twist(n).linear.x;
    if round(passo*n)-9>0
        if matrice(round(passo*n)-9,20)==0
            matrice(round(passo*n)-9,20)=twist(n).linear.x;
        end
    end

    matrice(round(passo*n),21)=twist(n).linear.y;

    matrice(round(passo*n)-1,21)=twist(n).linear.y;
    matrice(round(passo*n)-2,21)=twist(n).linear.y;
    matrice(round(passo*n)-3,21)=twist(n).linear.y;
    matrice(round(passo*n)-4,21)=twist(n).linear.y;
    matrice(round(passo*n)-5,21)=twist(n).linear.y;
    matrice(round(passo*n)-6,21)=twist(n).linear.y;
    matrice(round(passo*n)-7,21)=twist(n).linear.y;
    matrice(round(passo*n)-8,21)=twist(n).linear.y;
    if round(passo*n)-9>0
        if matrice(round(passo*n)-9,21)==0
            matrice(round(passo*n)-9,21)=twist(n).linear.y;
        end
    end

    matrice(round(passo*n),22)=twist(n).linear.z;

    matrice(round(passo*n)-1,22)=twist(n).linear.z;
    matrice(round(passo*n)-2,22)=twist(n).linear.z;
    matrice(round(passo*n)-3,22)=twist(n).linear.z;
    matrice(round(passo*n)-4,22)=twist(n).linear.z;
    matrice(round(passo*n)-5,22)=twist(n).linear.z;
    matrice(round(passo*n)-6,22)=twist(n).linear.z;
    matrice(round(passo*n)-7,22)=twist(n).linear.z;
    matrice(round(passo*n)-8,22)=twist(n).linear.z;
    if round(passo*n)-9>0
        if matrice(round(passo*n)-9,22)==0
            matrice(round(passo*n)-9,22)=twist(n).linear.z;
        end
    end
end

TT20=timetable(timestamp, matrice(:,20));
TT21=timetable(timestamp, matrice(:,21));
TT22=timetable(timestamp, matrice(:,22));

%% Temperature

for n=1:size(Temperature,[1])
    passo=array/size(Temperature.temperature,[1]);
    matrice(round(passo*n),23)=Temperature.temperature(n);

    if matrice(round(passo*n)-1,23)==0
        matrice(round(passo*n)-1,23)=Temperature.temperature(n);
    end

end

TT23=timetable(timestamp, matrice(:,23));

%% Roll
for n=1:size(Roll,[1])
    passo=array/size(Roll,[1]);

    matrice(round(passo*n),24)=Roll.measured(n);
    matrice(round(passo*n),25)=Roll.commanded(n);
    matrice(round(passo*n),26)=Pitch.measured(n);
    matrice(round(passo*n),27)=Pitch.commanded(n);
    matrice(round(passo*n),28)=Yaw.measured(n);
    matrice(round(passo*n),29)=Yaw.commanded(n);


end

TT24=timetable(timestamp,matrice(:,24));
TT25=timetable(timestamp,matrice(:,25));
TT26=timetable(timestamp,matrice(:,26));
TT27=timetable(timestamp,matrice(:,27));
TT28=timetable(timestamp,matrice(:,28));
TT29=timetable(timestamp,matrice(:,29));

%% Rc_out

for n=1:size(Rc_out,[1])
    passo=array/size(Rc_out,[1]);
    matrice(round(passo*n),30)=cell2mat(Rc_out(n,1));

    matrice(round(passo*n)-1,30)=cell2mat(Rc_out(n,1));
    matrice(round(passo*n)-2,30)=cell2mat(Rc_out(n,1));
    matrice(round(passo*n)-3,30)=cell2mat(Rc_out(n,1));
    matrice(round(passo*n)-4,30)=cell2mat(Rc_out(n,1));
    matrice(round(passo*n)-5,30)=cell2mat(Rc_out(n,1));
    if round(passo*n)-6>0
        if matrice(round(passo*n)-6,30)==0
            matrice(round(passo*n)-6,30)=cell2mat(Rc_out(n,1));
        end
    end

    matrice(round(passo*n),31)=cell2mat(Rc_out(n,2));

    matrice(round(passo*n)-1,31)=cell2mat(Rc_out(n,2));
    matrice(round(passo*n)-2,31)=cell2mat(Rc_out(n,2));
    matrice(round(passo*n)-3,31)=cell2mat(Rc_out(n,2));
    matrice(round(passo*n)-4,31)=cell2mat(Rc_out(n,2));
    matrice(round(passo*n)-5,31)=cell2mat(Rc_out(n,2));
    if round(passo*n)-6>0
        if matrice(round(passo*n)-6,31)==0
            matrice(round(passo*n)-6,31)=cell2mat(Rc_out(n,2));
        end
    end

    matrice(round(passo*n),32)=cell2mat(Rc_out(n,3));

    matrice(round(passo*n)-1,32)=cell2mat(Rc_out(n,3));
    matrice(round(passo*n)-2,32)=cell2mat(Rc_out(n,3));
    matrice(round(passo*n)-3,32)=cell2mat(Rc_out(n,3));
    matrice(round(passo*n)-4,32)=cell2mat(Rc_out(n,3));
    matrice(round(passo*n)-5,32)=cell2mat(Rc_out(n,3));
    if round(passo*n)-6>0
        if matrice(round(passo*n)-6,32)==0
            matrice(round(passo*n)-6,32)=cell2mat(Rc_out(n,3));
        end
    end

    matrice(round(passo*n),33)=cell2mat(Rc_out(n,4));

    matrice(round(passo*n)-1,33)=cell2mat(Rc_out(n,4));
    matrice(round(passo*n)-2,33)=cell2mat(Rc_out(n,4));
    matrice(round(passo*n)-3,33)=cell2mat(Rc_out(n,4));
    matrice(round(passo*n)-4,33)=cell2mat(Rc_out(n,4));
    matrice(round(passo*n)-5,33)=cell2mat(Rc_out(n,4));
    if round(passo*n)-6>0
        if matrice(round(passo*n)-6,33)==0
            matrice(round(passo*n)-6,33)=cell2mat(Rc_out(n,4));
        end
    end

    matrice(round(passo*n),34)=cell2mat(Rc_out(n,5));

    matrice(round(passo*n)-1,34)=cell2mat(Rc_out(n,5));
    matrice(round(passo*n)-2,34)=cell2mat(Rc_out(n,5));
    matrice(round(passo*n)-3,34)=cell2mat(Rc_out(n,5));
    matrice(round(passo*n)-4,34)=cell2mat(Rc_out(n,5));
    matrice(round(passo*n)-5,34)=cell2mat(Rc_out(n,5));
    if round(passo*n)-6>0
        if matrice(round(passo*n)-6,34)==0
            matrice(round(passo*n)-6,34)=cell2mat(Rc_out(n,5));
        end
    end

     matrice(round(passo*n),35)=cell2mat(Rc_out(n,6));

    matrice(round(passo*n)-1,35)=cell2mat(Rc_out(n,6));
    matrice(round(passo*n)-2,35)=cell2mat(Rc_out(n,6));
    matrice(round(passo*n)-3,35)=cell2mat(Rc_out(n,6));
    matrice(round(passo*n)-4,35)=cell2mat(Rc_out(n,6));
    matrice(round(passo*n)-5,35)=cell2mat(Rc_out(n,6));
    if round(passo*n)-6>0
        if matrice(round(passo*n)-6,35)==0
            matrice(round(passo*n)-6,35)=cell2mat(Rc_out(n,6));
        end
    end

    matrice(round(passo*n),36)=cell2mat(Rc_out(n,7));

    matrice(round(passo*n)-1,36)=cell2mat(Rc_out(n,7));
    matrice(round(passo*n)-2,36)=cell2mat(Rc_out(n,7));
    matrice(round(passo*n)-3,36)=cell2mat(Rc_out(n,7));
    matrice(round(passo*n)-4,36)=cell2mat(Rc_out(n,7));
    matrice(round(passo*n)-5,36)=cell2mat(Rc_out(n,7));
    if round(passo*n)-6>0
        if matrice(round(passo*n)-6,36)==0
            matrice(round(passo*n)-6,36)=cell2mat(Rc_out(n,7));
        end
    end

    matrice(round(passo*n),37)=cell2mat(Rc_out(n,8));

    matrice(round(passo*n)-1,37)=cell2mat(Rc_out(n,8));
    matrice(round(passo*n)-2,37)=cell2mat(Rc_out(n,8));
    matrice(round(passo*n)-3,37)=cell2mat(Rc_out(n,8));
    matrice(round(passo*n)-4,37)=cell2mat(Rc_out(n,8));
    matrice(round(passo*n)-5,37)=cell2mat(Rc_out(n,8));
    if round(passo*n)-6>0
        if matrice(round(passo*n)-6,37)==0
            matrice(round(passo*n)-6,37)=cell2mat(Rc_out(n,8));
        end
    end
end

TT30=timetable(timestamp,matrice(:,30));
TT31=timetable(timestamp,matrice(:,31));
TT32=timetable(timestamp,matrice(:,32));
TT33=timetable(timestamp,matrice(:,33));
TT34=timetable(timestamp,matrice(:,34));
TT35=timetable(timestamp,matrice(:,35));
TT36=timetable(timestamp,matrice(:,36));
TT37=timetable(timestamp,matrice(:,37));

for n=1:size(Errors,[1])
    passo=array/size(Errors,[1]);

    matrice(round(passo*n),38)=table2array(Errors(n,2));
    matrice(round(passo*n),39)=table2array(Errors(n,4));
    matrice(round(passo*n),40)=table2array(Errors(n,5));

end
TT38=timetable(timestamp,matrice(:,38));
TT39=timetable(timestamp,matrice(:,39));
TT40=timetable(timestamp,matrice(:,40));



Dataset=table('Size',[1 41],'VariableTypes',["cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","cell","double"]);
Dataset(1,1)={TT};
Dataset(1,2)={TT2};
Dataset(1,3)={TT3};
Dataset(1,4)={TT4};
Dataset(1,5)={TT5};
Dataset(1,6)={TT6};
Dataset(1,7)={TT7};
Dataset(1,8)={TT8};
Dataset(1,9)={TT9};
Dataset(1,10)={TT10};
Dataset(1,11)={TT11};
Dataset(1,12)={TT12};
Dataset(1,13)={TT13};
Dataset(1,14)={TT14};
Dataset(1,15)={TT15};
Dataset(1,16)={TT16};
Dataset(1,17)={TT17};
Dataset(1,18)={TT18};
Dataset(1,19)={TT19};
Dataset(1,20)={TT20};
Dataset(1,21)={TT21};
Dataset(1,22)={TT22};
Dataset(1,23)={TT23};
Dataset(1,24)={TT24};
Dataset(1,25)={TT25};
Dataset(1,26)={TT26};
Dataset(1,27)={TT27};
Dataset(1,28)={TT28};
Dataset(1,29)={TT29};
Dataset(1,30)={TT30};
Dataset(1,31)={TT31};
Dataset(1,32)={TT32};
Dataset(1,33)={TT33};
Dataset(1,34)={TT34};
Dataset(1,35)={TT35};
Dataset(1,36)={TT36};
Dataset(1,37)={TT37};
Dataset(1,38)={TT38};
Dataset(1,39)={TT39};
Dataset(1,40)={TT40};
Dataset(1,41)=faultCode;
