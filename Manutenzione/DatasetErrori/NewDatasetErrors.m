Tabella = [Dataset1;Dataset2;Dataset3;Dataset4;Dataset5;Dataset6;Dataset7;Dataset8;Dataset9;Dataset10;
    Dataset11;Dataset12;Dataset13;Dataset14;Dataset15;Dataset16;Dataset17;Dataset18;Dataset19;Dataset20
    Dataset21;Dataset22;Dataset23;Dataset24;Dataset25;Dataset26;Dataset27;Dataset28;Dataset29;Dataset30
    Dataset31;Dataset32;Dataset33;Dataset34;Dataset35;Dataset36;Dataset37;Dataset38;Dataset39;Dataset40
    Dataset41;Dataset42;Dataset43;Dataset44;Dataset45;Dataset46;Dataset47];

Tabella = cell2table(Tabella);
Tabella=renamevars(Tabella,["Tabella1","Tabella2","Tabella3","Tabella4","Tabella5","Tabella6","Tabella7","Tabella8","Tabella9","Tabella10"],["vel_x_diff","vel_y_diff","vel_z_diff","roll_diff","pitch_dif","yaw_diff","err_track","err_speed","err_alt","failure_label"]);