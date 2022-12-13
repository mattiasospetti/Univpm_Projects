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
flag2=0;

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

for n=2:size(Velox,[1])

    passo=array/size(Velox,[1]);

    %% Velocità Singole

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

for n=1:size(matrice(:,10))
%% Differenze Velocità

    matrice(n,16) = matrice(n,10) - matrice(n,14);

    matrice(n,17) = matrice(n,11) - matrice(n,13);

    matrice(n,18) =  matrice(n,12) -  matrice(n,15);
end

for n=1:size(Roll,[1])
    passo=array/size(Roll,[1]);

    matrice(round(passo*n),24)=Roll.measured(n);
    matrice(round(passo*n),25)=Roll.commanded(n);
    matrice(round(passo*n),26)=Pitch.measured(n);
    matrice(round(passo*n),27)=Pitch.commanded(n);
    matrice(round(passo*n),28)=Yaw.measured(n);
    matrice(round(passo*n),29)=Yaw.commanded(n);

end

%% Differenze Roll, Pitch, Yaw

for n=1:size(matrice(:,24))
    matrice(n,19) = matrice(n,25) - matrice(n,24);

    matrice(n,20) = matrice(n,27) - matrice(n,26);

    matrice(n,21) =  matrice(n,29) -  matrice(n,28);
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
        switch flag
            case 1 % engine
                for n=array-b+1:array
                    matrice(n,41)=1;
                end
            case 2 % rudder
                for n=array-b+1:array
                    matrice(n,41)=table2array(Failures(1,2));
                end
            case 3 % aileron
                if flag2==1 % aileron e rudder rotti
                    for n=array-b+1:array
                        matrice(n,41)=8;
                    end
                else
                    for n=array-b+1:array
                        matrice(n,41)=table2array(Failures(1,2))+4;
                    end
                end
            case 4 %elevator
                for n=array-b+1:array
                    matrice(n,41)=table2array(Failures(1,2))+3;
                end
            otherwise
                disp("Errore");
        end

    end


else

    for n=1:array
        matrice(n,41)=0;
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

TT=timetable(timestamp, matrice(:,16),matrice(:,17),matrice(:,18),matrice(:,19),matrice(:,20),matrice(:,21),matrice(:,38),matrice(:,39),matrice(:,40),matrice(:,41));
TT=renamevars(TT,["Var10"],["failure_label"]);

vettore=[];
passo=floor(array/10);
flag = 0;
vettore_1=[];
step = round(array/passo);
for i=0:((round(array/passo))-1)
vettore{i+1}= timetable2table( TT(i*passo+1:i*passo+passo,:));
end

vettore=vettore.';
for i=1:(round(array/passo))
for j=1:passo
    if  not(vettore{i}.failure_label(j) == 0)
        flag = vettore{i}.failure_label(j);
    end
end
vettore(i,2)=num2cell(flag);
vettore_1{1,i} = table2timetable(vettore{i});
vettore_1{2,i} = flag;
end

vettore_1 = vettore_1.';
vettore_1 = cell2table(vettore_1);
Dati = [];
dataset=[];

for j=1:(round(array/passo))
for i=1:10
    a=vettore_1(j,1).vettore_11{1};
    b=timetable2table(a(:,i));
    TT=timetable(a.timestamp,table2array(b(:,2)));
    dataset{i}=TT;
end
dataset{10}=vettore_1(j,2).vettore_12;
Dati = [Dati;dataset];
end