Tabella = [Dataset1;Dataset2;Dataset3;Dataset4;Dataset5;Dataset6;Dataset7;Dataset8;Dataset9;Dataset10;
    Dataset11;Dataset12;Dataset13;Dataset14;Dataset15;Dataset16;Dataset17;Dataset18;Dataset19;Dataset20
    Dataset21;Dataset22;Dataset23;Dataset24;Dataset25;Dataset26;Dataset27;Dataset28;Dataset29;Dataset30
    Dataset31;Dataset32;Dataset33;Dataset34;Dataset35;Dataset36;Dataset37;Dataset38;Dataset39;Dataset40
    Dataset41;Dataset42;Dataset43;Dataset44;Dataset45;Dataset46;Dataset47];

Tabella = cell2table(Tabella);
Tabella=renamevars(Tabella,["Tabella1","Tabella2","Tabella3","Tabella4","Tabella5","Tabella6","Tabella7","Tabella8","Tabella9","Tabella10","Tabella11","Tabella12","Tabella13","Tabella14","Tabella15","Tabella16","Tabella17","Tabella18","Tabella19","Tabella20","Tabella21","Tabella22","Tabella23","Tabella24","Tabella25","Tabella26","Tabella27","Tabella28","Tabella29","Tabella30","Tabella31","Tabella32","Tabella33","Tabella34","Tabella35","Tabella36","Tabella37","Tabella38","Tabella39","Tabella40","Tabella41"],["acc_x","acc_y","acc_z","gyro_x","gyro_y","gyro_z","mag_x","mag_y","mag_z","vel_x_des","vel_y_des","vel_z_des","vel_x","vel_y","vel_z","atm_press","gps_x","gps_y","gps_z","wind_x","wind_y","wind_z","IMU_temp","roll","roll_des","pitch","pitch_des","yaw","yaw_des", "ch1","ch2","ch3","ch4","ch5","ch6","ch7","ch8","err_track","err_speed","err_alt","failure_label"]);