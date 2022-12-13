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

if valEngines
    flag=1;
    Failures=Topics.failure_status_engines{1};
end

Exist_Column = strcmp('failure_status_rudder',Topics.Properties.VariableNames);
valRudder = Exist_Column(Exist_Column==1);

if valRudder
    flag=2;
    flag2=1;
    Failures=Topics.failure_status_rudder{1};
end

Exist_Column = strcmp('failure_status_aileron',Topics.Properties.VariableNames);
valAileron = Exist_Column(Exist_Column==1);

if valAileron
    flag=3;

    Failures=Topics.failure_status_aileron{1};
end

Exist_Column = strcmp('failure_status_elevator',Topics.Properties.VariableNames);
valElevator = Exist_Column(Exist_Column==1);

if valElevator
    flag=4;
    Failures=Topics.failure_status_elevator{1};

end

time_ref=Topics.mavros_time_reference{1};

array=size(Topics.mavros_nav_info_pitch{1},[1]);

matrice=zeros(array,41);
size_time=size(time_ref,[1]);

vettore={};
t={};

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

for n=1:size(Pressure,[1])
    passo=array/size(Pressure,[1]);
    matrice(round(passo*n),16)=table2array(Pressure(n,1));
    matrice(round(passo*n)-1,16)=table2array(Pressure(n,1));
end

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

for n=1:size(Temperature,[1])
    passo=array/size(Temperature.temperature,[1]);
    matrice(round(passo*n),23)=Temperature.temperature(n);

    if matrice(round(passo*n)-1,23)==0
        matrice(round(passo*n)-1,23)=Temperature.temperature(n);
    end

end

for n=1:size(Roll,[1])-1
    passo=array/size(Roll,[1]);

    matrice(round(passo*n),24)=Roll.measured(n);
    matrice(round(passo*n),25)=Roll.commanded(n);
    matrice(round(passo*n),26)=Pitch.measured(n);
    matrice(round(passo*n),27)=Pitch.commanded(n);
    matrice(round(passo*n),28)=Yaw.measured(n);
    matrice(round(passo*n),29)=Yaw.commanded(n);


end

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

for n=1:size(Errors,[1])
    passo=array/size(Errors,[1]);

    matrice(round(passo*n),38)=table2array(Errors(n,2));
    matrice(round(passo*n),39)=table2array(Errors(n,4));
    matrice(round(passo*n),40)=table2array(Errors(n,5));


end

if isa(Failures,"table")
    for n=1:size(Failures,[1])

        a= (array*5)/25; % numero di misurazioni totali su una scala di 5Hz
        b= array*size(Failures,[1])/a; % numero di 1 in 25Hz

        for n=1:array-b
            matrice(n,41)=0;
        end

        contatore = 0;
        for i=1:size(Failures,[1])
            if Failures.data(i)==2
                contatore = contatore +1;
            end
        end

        % proporzione per contatore contatore: x = 5:25
        for i=array-b+1:(array-b+1+(contatore*25/5))
            matrice(i,41)=6;
        end

        for i=array-b+1+(contatore*25/5):array
            matrice(i,41)=5;
        end
    end
end

%% Tempo
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

TT=timetable(timestamp, matrice(:,1),matrice(:,2),matrice(:,3),matrice(:,4),matrice(:,5),matrice(:,6),matrice(:,7),matrice(:,8),matrice(:,9),matrice(:,10),matrice(:,11),matrice(:,12),matrice(:,13),matrice(:,14),matrice(:,15),matrice(:,16),matrice(:,17),matrice(:,18),matrice(:,19),matrice(:,20),matrice(:,21),matrice(:,22),matrice(:,23),matrice(:,24),matrice(:,25),matrice(:,26),matrice(:,27),matrice(:,28),matrice(:,29),matrice(:,30),matrice(:,31),matrice(:,32),matrice(:,33),matrice(:,34),matrice(:,35),matrice(:,36),matrice(:,37),matrice(:,38),matrice(:,39),matrice(:,40),matrice(:,41));
TT=renamevars(TT,["Var1","Var2","Var3","Var4","Var5","Var6","Var7","Var8","Var9","Var10","Var11","Var12","Var13","Var14","Var15","Var16","Var17","Var18","Var19","Var20","Var21","Var22","Var23","Var24","Var25","Var26","Var27","Var28","Var29","Var30","Var31","Var32","Var33","Var34","Var35","Var36","Var37","Var38","Var39","Var40","Var41"],["acc_x","acc_y","acc_z","gyro_x","gyro_y","gyro_z","mag_x","mag_y","mag_z","vel_x_des","vel_y_des","vel_z_des","vel_x","vel_y","vel_z","atm_press","gps_x","gps_y","gps_z","wind_x","wind_y","wind_z","IMU_temp","roll","roll_des","pitch","pitch_des","yaw","yaw_des", "ch1","ch2","ch3","ch4","ch5","ch6","ch7","ch8","err_track","err_speed","err_alt","failure_label"]);

vettore=[];
passo=floor(array/10);
flag1 = 0;
vettore_1=[];
step = round(array/passo);
for i=0:((round(array/passo))-1)
    vettore{i+1}= timetable2table( TT(i*passo+1:i*passo+passo,:));
end

vettore=vettore.';
for i=1:(round(array/passo))
    for j=1:passo
        if  not(vettore{i}.failure_label(j) == 0)
            flag1 = vettore{i}.failure_label(j);
        end
end
vettore(i,2)=num2cell(flag1);
vettore_1{1,i} = table2timetable(vettore{i});
vettore_1{2,i} = flag1;
end

vettore_1 = vettore_1.';
vettore_1 = cell2table(vettore_1);
Dati = [];
dataset=[];

for j=1:(round(array/passo))
for i=1:40
a=vettore_1(j,1).vettore_11{1};
b=timetable2table(a(:,i));
TT=timetable(a.timestamp,table2array(b(:,2)));
dataset{i}=TT;
end
dataset{41}=vettore_1(j,2).vettore_12;
Dati = [Dati;dataset];
end




