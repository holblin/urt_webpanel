//**************************************************************************//
//																			//
//					Global config for all server							//
//																			//
//**************************************************************************//

//Example config. Note that everything behind // is ignored by the game
//Try to keep cvar-values as short as possible. Otherwise you might get "info string length exceeded" errors on your server
 
//*** Administrator Info, shows in some gamebrowsers ***
sets " Admin" "adminname" //Uses a space in front so it shows up at the top of the properties list
sets " Email" "xxx@xxx.xxx"
 
//*** Server Name and Daily Message ***
set sv_hostname						"[NEW] Holblin and Asche server" //Your servername here
set g_motd							"http://www.unity-team.org" //Your message of the day here, it is displayed while connecting
set sv_joinmessage					"Welcome to Asche & Holblin server" //Your joinmessage here, it is displayed when the game is joined
 
//*** General Game Settings ***
set sv_maxclients					"16" //max clientslots available on the server, using more than 16 is not advised. It can cause lag and most maps are not built for it. Going over 24 can cause nasty bugs.
set g_maxGameClients				"0" //max clients that can actually join the game. Other clients are forced to spectate. 0=all
set sv_privateClients				"4" //Amount of private slots. This amount of slots will be reserved for players who enter the right privatepassword
set g_gametype						"4" //0=FreeForAll, 3=TeamDeathMatch, 4=Team Survivor, 5=Follow the Leader, 6=Capture and Hold, 7=Capture The Flag, 8=Bombmode
sets sv_dlURL						"maps.xtr3m.net" //Sets the address for auto-downloading. Auto-download only works on ioUrbanTerror-clients, not quake3-clients. The client will try to download <sv_dlURL>/q3ut4/mapname.pk3. So if your server is running ut4_coolmap and sv_dlURL is set to 'yoursite.com/maps', make sure the maps is hosted at http://www.yoursite.com/maps/q3ut4/ut4_coolmap.pk3. Leaving this set 'urbanterror.info' will make it use a map mirror with the most common maps on it. If you got your own hosting, please us that though, to save bandwith.
 
//*** Passwords ***
set rconpassword					"encoredutravail!" //Password to control the server remotely using rcon.
set sv_privatePassword				"unityclan" //password for private slots
set g_password						"" //password for the server. Nothing = public
 
//*** Limits/times ***
set timelimit						"20" //time in minutes before map is over, 0=never
set fraglimit						"0" //amount of points to be scored before map is over, 0=never
set capturelimit					"12" //amount of flagcaps before map is over, 0=never
set g_warmup						"15" //time in seconds before game starts when changed to a new map. Gives slower computers time to load before game starts
 
//*** Respawning *** (FFA, TDM, CAH, CTF)
set g_respawnDelay					"15" //seconds before respawn, ignored when g_waverespawns is 1
set g_forcerespawn					"20" //seconds before respawn is forced, even when plater did not press fire
set g_waverespawns					"1" //use waverespawns, meaning everybody in a team respawns at the same time
set g_bluewave						"15" //seconds between blue waverespawns, ignored when g_waverespawns is 0
set g_redwave						"15" //seconds between red waverespawns, ignored when g_waverespawns is 0
set g_respawnProtection				"2" //amount of seconds a spawning players is protected from damage
 
//*** Rules ***
set g_deadchat						"1" //Determines if alive players can see dead players message. 0=living players can not see dead players chat 1=living players see only team-messages from dead teammembers 2=living players also see normal chats from dead players
set g_antiwarp						"1" //enable or disable antiwarp. This option smooths the movement of warping players (warping is caused by a crappy connection, for instance when torrenting during playing). The warping player will experience stutters when this is enabled
set g_antiwarptol					"50" //tolerance of the antiwarp. Higher = more tolerant. 50=default
set g_gear							"0" //bitmask that decides which votes are allowed and which not. Check http://www.urbanterror.info/gear_calc.html to find the correct number
set g_allowvote						"536871039" //bitmask that decides which votes are allowed and which not. Check http://www.urbanterror.info/allowvote_calc.html to find the correct number
set g_failedvotetime				"300" //time in seconds before someone can call another vote after another has failed
set g_followstrict					"1" //1=no haunting of enemies when dead
set sv_floodprotect					"1" //1=stops clients from spamming many chatlines
 
//*** Matchmode ***
set g_matchmode						"0" //matchmode is for matchplay. Features timeouts and ready-commands
set g_timeouts						"3" //ammount of timeouts that a team can do per map
set g_timeoutlength					"240" //length of the timeout
set g_pauselength					"0" //length of a pause. This can only be done by rcon. 0=indefinatly
 
//*** Team Game Settings ***
set g_friendlyFire					"1" //0=no friendlyfire 1=friendlyfire on, kick after too many TK's 2=friendlyfire on, no kicks
set g_maxteamkills					"3" //amount of TK's before you get kicked when friendlyfire is 1
set g_teamkillsforgettime 			"300" //amount of seconds before TK's are forgotten
set g_teamautojoin					"0" //force players to autojoin on connect, instead of letting them spec untill they join themselves
set g_teamForceBalance				"1" //if on, you can't join a team when it has more players then the other
set g_maintainTeam					"1" //when switching maps, players will stay in their team
set g_teamnamered					"" //name for the red team, nothing = Red Dragons
set g_teamnameblue					"" //name for the red team, nothing = SWAT
set g_swaproles						"0" //When map is over, play it again with the teams swapped (recommended for bombmode). After that, change map. 0=change map immediatly when map is over, no swapping of teams
 
//*** Team Survivor/Bombmode/Follow the Leader Specific Settings ***
set g_maxrounds						"0" //number of rounds before map is over, 0=never
set g_RoundTime						"3" //maximum minutes a round can take
set g_survivorrule					"0" //0=teams don't get a point when time is up before everyone is dead. 1=team with most players left gets point
set g_suddendeath					"1" //when map is over and both teams have same amount of points, add another round
set g_bombdefusetime				"10" //seconds it takes to defuse bomb
set g_bombexplodetime				"40" //seconds before bomb goes off after planting
 
//*** Capture the flag Specific Settings ***
set g_flagreturntime				"30" //if a flag is dropped, return it after this amount of seconds
set g_hotpotato						"1" //when both flags are taken, they will explode after this amount of minutes

//*** Referees Settings ***
seta g_refNoBan                     "1"  // Referees cannot ban fellow gamers

 
//*** Advanced settings *** Dont change, unless you know what you are doing
set sv_strictauth					"0" //1=check for valid cdkey, this means ioUrbanTerror players will not be able to join
set sv_pure							"1" //dont let players load modified pk3-files
set sv_cheats						"0"
set sv_maxRate						"0" //maximum traffic per second the server will send per client. 25000 or 0 = max
set sv_timeout						"90" //time in seconds before player with a interupted connection will be kicked
set g_inactivity					"90" //time in seconds before a non-moving player will be kicked
set g_gravity						"800"
set g_knockback						"1000"
set g_syncronousClients				"0"
set g_bulletPredictionThreshold		"5"
set g_allowBulletPrediction			"1"
set pmove_fixed						"1"
set pmove_msec						"8"
set g_removeBodyTime				"10"  // Time in seconds for dead bodies to fade away

//*** Master Servers *** Servers the server will report to if 'dedicated' is set to 2. When set to 1, it doesn't report.
set sv_master1						"" //This one will be set automatically by the game-engine, so just leave it blank
set sv_master2						"master.urbanterror.info"
set sv_master3						"master2.urbanterror.info"
set sv_master4						"master.quake3arena.com"
set sv_master5						""
 
//*** Other Settings ***
set g_armbands						"0" //determines the behaviour of the armbandcolor (also shows on playerlist and minimap). 0=player's choice, set with cg_rgb 1=Based on teamcolor (red or blue) 2=assigned by server (random)
set sv_maxping						"130" //max ping a client may have when connecting to the server
set sv_minping						"0" //min ping a client may have when connecting to the server
set g_allowchat						"2" //0= no chatting at all 1=teamchats only 2=all chats
set g_log							"log/games.log" //name of the logfile. Empty ("") means no log. Log will be in the q3ut4 folder in windows. Linux uses ~/.q3a/q3ut4
set g_logsync						"1" //enables/disables direct writing to the log file instead of buffered
set g_loghits						"0" //log every single hit. Creates very big logs
set g_logroll						"0" //create new log every now and then, instead of always using the same one
set logfile							"0" //additional logging in seperate qconsole.log file. 1=buffered, 2=synced
set g_cahtime						"60" //Interval in seconds of awarding points for flags in Capture and Hold gamemode
 
//*** Anti Cheat ***
//pb_sv_enable //to enable PB, remove the // at the beginning of this line (only works when using Quake 3 Arena, not ioUrbanTerror)
set sv_battleye						"0" //Keep this disabled, BattlEye is dead

//*** Map Rotation ***
map ut4_turnpike //what map to start with


//**************************************************************************//
//																			//
//					Global config for all server							//
//																			//
//**************************************************************************//

//Example config. Note that everything behind // is ignored by the game
//Try to keep cvar-values as short as possible. Otherwise you might get "info string length exceeded" errors on your server
 
//*** Administrator Info, shows in some gamebrowsers ***
sets " Admin" "adminname" //Uses a space in front so it shows up at the top of the properties list
sets " Email" "xxx@xxx.xxx"
 
//*** Server Name and Daily Message ***
set sv_hostname						"[NEW] Holblin and Asche server" //Your servername here
set g_motd							"http://www.unity-team.org" //Your message of the day here, it is displayed while connecting
set sv_joinmessage					"Welcome to Asche & Holblin server" //Your joinmessage here, it is displayed when the game is joined
 
//*** General Game Settings ***
set sv_maxclients					"16" //max clientslots available on the server, using more than 16 is not advised. It can cause lag and most maps are not built for it. Going over 24 can cause nasty bugs.
set g_maxGameClients				"0" //max clients that can actually join the game. Other clients are forced to spectate. 0=all
set sv_privateClients				"4" //Amount of private slots. This amount of slots will be reserved for players who enter the right privatepassword
set g_gametype						"4" //0=FreeForAll, 3=TeamDeathMatch, 4=Team Survivor, 5=Follow the Leader, 6=Capture and Hold, 7=Capture The Flag, 8=Bombmode
sets sv_dlURL						"maps.xtr3m.net" //Sets the address for auto-downloading. Auto-download only works on ioUrbanTerror-clients, not quake3-clients. The client will try to download <sv_dlURL>/q3ut4/mapname.pk3. So if your server is running ut4_coolmap and sv_dlURL is set to 'yoursite.com/maps', make sure the maps is hosted at http://www.yoursite.com/maps/q3ut4/ut4_coolmap.pk3. Leaving this set 'urbanterror.info' will make it use a map mirror with the most common maps on it. If you got your own hosting, please us that though, to save bandwith.
 
//*** Passwords ***
set rconpassword					"encoredutravail!" //Password to control the server remotely using rcon.
set sv_privatePassword				"unityclan" //password for private slots
set g_password						"" //password for the server. Nothing = public
 
//*** Limits/times ***
set timelimit						"20" //time in minutes before map is over, 0=never
set fraglimit						"0" //amount of points to be scored before map is over, 0=never
set capturelimit					"12" //amount of flagcaps before map is over, 0=never
set g_warmup						"15" //time in seconds before game starts when changed to a new map. Gives slower computers time to load before game starts
 
//*** Respawning *** (FFA, TDM, CAH, CTF)
set g_respawnDelay					"15" //seconds before respawn, ignored when g_waverespawns is 1
set g_forcerespawn					"20" //seconds before respawn is forced, even when plater did not press fire
set g_waverespawns					"1" //use waverespawns, meaning everybody in a team respawns at the same time
set g_bluewave						"15" //seconds between blue waverespawns, ignored when g_waverespawns is 0
set g_redwave						"15" //seconds between red waverespawns, ignored when g_waverespawns is 0
set g_respawnProtection				"2" //amount of seconds a spawning players is protected from damage
 
//*** Rules ***
set g_deadchat						"1" //Determines if alive players can see dead players message. 0=living players can not see dead players chat 1=living players see only team-messages from dead teammembers 2=living players also see normal chats from dead players
set g_antiwarp						"1" //enable or disable antiwarp. This option smooths the movement of warping players (warping is caused by a crappy connection, for instance when torrenting during playing). The warping player will experience stutters when this is enabled
set g_antiwarptol					"50" //tolerance of the antiwarp. Higher = more tolerant. 50=default
set g_gear							"0" //bitmask that decides which votes are allowed and which not. Check http://www.urbanterror.info/gear_calc.html to find the correct number
set g_allowvote						"536871039" //bitmask that decides which votes are allowed and which not. Check http://www.urbanterror.info/allowvote_calc.html to find the correct number
set g_failedvotetime				"300" //time in seconds before someone can call another vote after another has failed
set g_followstrict					"1" //1=no haunting of enemies when dead
set sv_floodprotect					"1" //1=stops clients from spamming many chatlines
 
//*** Matchmode ***
set g_matchmode						"0" //matchmode is for matchplay. Features timeouts and ready-commands
set g_timeouts						"3" //ammount of timeouts that a team can do per map
set g_timeoutlength					"240" //length of the timeout
set g_pauselength					"0" //length of a pause. This can only be done by rcon. 0=indefinatly
 
//*** Team Game Settings ***
set g_friendlyFire					"1" //0=no friendlyfire 1=friendlyfire on, kick after too many TK's 2=friendlyfire on, no kicks
set g_maxteamkills					"3" //amount of TK's before you get kicked when friendlyfire is 1
set g_teamkillsforgettime 			"300" //amount of seconds before TK's are forgotten
set g_teamautojoin					"0" //force players to autojoin on connect, instead of letting them spec untill they join themselves
set g_teamForceBalance				"1" //if on, you can't join a team when it has more players then the other
set g_maintainTeam					"1" //when switching maps, players will stay in their team
set g_teamnamered					"" //name for the red team, nothing = Red Dragons
set g_teamnameblue					"" //name for the red team, nothing = SWAT
set g_swaproles						"0" //When map is over, play it again with the teams swapped (recommended for bombmode). After that, change map. 0=change map immediatly when map is over, no swapping of teams
 
//*** Team Survivor/Bombmode/Follow the Leader Specific Settings ***
set g_maxrounds						"0" //number of rounds before map is over, 0=never
set g_RoundTime						"3" //maximum minutes a round can take
set g_survivorrule					"0" //0=teams don't get a point when time is up before everyone is dead. 1=team with most players left gets point
set g_suddendeath					"1" //when map is over and both teams have same amount of points, add another round
set g_bombdefusetime				"10" //seconds it takes to defuse bomb
set g_bombexplodetime				"40" //seconds before bomb goes off after planting
 
//*** Capture the flag Specific Settings ***
set g_flagreturntime				"30" //if a flag is dropped, return it after this amount of seconds
set g_hotpotato						"1" //when both flags are taken, they will explode after this amount of minutes

//*** Referees Settings ***
seta g_refNoBan                     "1"  // Referees cannot ban fellow gamers

 
//*** Advanced settings *** Dont change, unless you know what you are doing
set sv_strictauth					"0" //1=check for valid cdkey, this means ioUrbanTerror players will not be able to join
set sv_pure							"1" //dont let players load modified pk3-files
set sv_cheats						"0"
set sv_maxRate						"0" //maximum traffic per second the server will send per client. 25000 or 0 = max
set sv_timeout						"90" //time in seconds before player with a interupted connection will be kicked
set g_inactivity					"90" //time in seconds before a non-moving player will be kicked
set g_gravity						"800"
set g_knockback						"1000"
set g_syncronousClients				"0"
set g_bulletPredictionThreshold		"5"
set g_allowBulletPrediction			"1"
set pmove_fixed						"1"
set pmove_msec						"8"
set g_removeBodyTime				"10"  // Time in seconds for dead bodies to fade away

//*** Master Servers *** Servers the server will report to if 'dedicated' is set to 2. When set to 1, it doesn't report.
set sv_master1						"" //This one will be set automatically by the game-engine, so just leave it blank
set sv_master2						"master.urbanterror.info"
set sv_master3						"master2.urbanterror.info"
set sv_master4						"master.quake3arena.com"
set sv_master5						""
 
//*** Other Settings ***
set g_armbands						"0" //determines the behaviour of the armbandcolor (also shows on playerlist and minimap). 0=player's choice, set with cg_rgb 1=Based on teamcolor (red or blue) 2=assigned by server (random)
set sv_maxping						"130" //max ping a client may have when connecting to the server
set sv_minping						"0" //min ping a client may have when connecting to the server
set g_allowchat						"2" //0= no chatting at all 1=teamchats only 2=all chats
set g_log							"log/games.log" //name of the logfile. Empty ("") means no log. Log will be in the q3ut4 folder in windows. Linux uses ~/.q3a/q3ut4
set g_logsync						"1" //enables/disables direct writing to the log file instead of buffered
set g_loghits						"0" //log every single hit. Creates very big logs
set g_logroll						"0" //create new log every now and then, instead of always using the same one
set logfile							"0" //additional logging in seperate qconsole.log file. 1=buffered, 2=synced
set g_cahtime						"60" //Interval in seconds of awarding points for flags in Capture and Hold gamemode
 
//*** Anti Cheat ***
//pb_sv_enable //to enable PB, remove the // at the beginning of this line (only works when using Quake 3 Arena, not ioUrbanTerror)
set sv_battleye						"0" //Keep this disabled, BattlEye is dead

//*** Map Rotation ***
map ut4_turnpike //what map to start with

//**************************************************************************//
//																			//
//					Global config for all server							//
//																			//
//**************************************************************************//

//Example config. Note that everything behind // is ignored by the game
//Try to keep cvar-values as short as possible. Otherwise you might get "info string length exceeded" errors on your server
 
//*** Administrator Info, shows in some gamebrowsers ***
sets " Admin" "adminname" //Uses a space in front so it shows up at the top of the properties list
sets " Email" "xxx@xxx.xxx"
 
//*** Server Name and Daily Message ***
set sv_hostname						"[NEW] Holblin and Asche server" //Your servername here
set g_motd							"http://www.unity-team.org" //Your message of the day here, it is displayed while connecting
set sv_joinmessage					"Welcome to Asche & Holblin server" //Your joinmessage here, it is displayed when the game is joined
 
//*** General Game Settings ***
set sv_maxclients					"16" //max clientslots available on the server, using more than 16 is not advised. It can cause lag and most maps are not built for it. Going over 24 can cause nasty bugs.
set g_maxGameClients				"0" //max clients that can actually join the game. Other clients are forced to spectate. 0=all
set sv_privateClients				"4" //Amount of private slots. This amount of slots will be reserved for players who enter the right privatepassword
set g_gametype						"4" //0=FreeForAll, 3=TeamDeathMatch, 4=Team Survivor, 5=Follow the Leader, 6=Capture and Hold, 7=Capture The Flag, 8=Bombmode
sets sv_dlURL						"maps.xtr3m.net" //Sets the address for auto-downloading. Auto-download only works on ioUrbanTerror-clients, not quake3-clients. The client will try to download <sv_dlURL>/q3ut4/mapname.pk3. So if your server is running ut4_coolmap and sv_dlURL is set to 'yoursite.com/maps', make sure the maps is hosted at http://www.yoursite.com/maps/q3ut4/ut4_coolmap.pk3. Leaving this set 'urbanterror.info' will make it use a map mirror with the most common maps on it. If you got your own hosting, please us that though, to save bandwith.
 
//*** Passwords ***
set rconpassword					"encoredutravail!" //Password to control the server remotely using rcon.
set sv_privatePassword				"unityclan" //password for private slots
set g_password						"" //password for the server. Nothing = public
 
//*** Limits/times ***
set timelimit						"20" //time in minutes before map is over, 0=never
set fraglimit						"0" //amount of points to be scored before map is over, 0=never
set capturelimit					"12" //amount of flagcaps before map is over, 0=never
set g_warmup						"15" //time in seconds before game starts when changed to a new map. Gives slower computers time to load before game starts
 
//*** Respawning *** (FFA, TDM, CAH, CTF)
set g_respawnDelay					"15" //seconds before respawn, ignored when g_waverespawns is 1
set g_forcerespawn					"20" //seconds before respawn is forced, even when plater did not press fire
set g_waverespawns					"1" //use waverespawns, meaning everybody in a team respawns at the same time
set g_bluewave						"15" //seconds between blue waverespawns, ignored when g_waverespawns is 0
set g_redwave						"15" //seconds between red waverespawns, ignored when g_waverespawns is 0
set g_respawnProtection				"2" //amount of seconds a spawning players is protected from damage
 
//*** Rules ***
set g_deadchat						"1" //Determines if alive players can see dead players message. 0=living players can not see dead players chat 1=living players see only team-messages from dead teammembers 2=living players also see normal chats from dead players
set g_antiwarp						"1" //enable or disable antiwarp. This option smooths the movement of warping players (warping is caused by a crappy connection, for instance when torrenting during playing). The warping player will experience stutters when this is enabled
set g_antiwarptol					"50" //tolerance of the antiwarp. Higher = more tolerant. 50=default
set g_gear							"0" //bitmask that decides which votes are allowed and which not. Check http://www.urbanterror.info/gear_calc.html to find the correct number
set g_allowvote						"536871039" //bitmask that decides which votes are allowed and which not. Check http://www.urbanterror.info/allowvote_calc.html to find the correct number
set g_failedvotetime				"300" //time in seconds before someone can call another vote after another has failed
set g_followstrict					"1" //1=no haunting of enemies when dead
set sv_floodprotect					"1" //1=stops clients from spamming many chatlines
 
//*** Matchmode ***
set g_matchmode						"0" //matchmode is for matchplay. Features timeouts and ready-commands
set g_timeouts						"3" //ammount of timeouts that a team can do per map
set g_timeoutlength					"240" //length of the timeout
set g_pauselength					"0" //length of a pause. This can only be done by rcon. 0=indefinatly
 
//*** Team Game Settings ***
set g_friendlyFire					"1" //0=no friendlyfire 1=friendlyfire on, kick after too many TK's 2=friendlyfire on, no kicks
set g_maxteamkills					"3" //amount of TK's before you get kicked when friendlyfire is 1
set g_teamkillsforgettime 			"300" //amount of seconds before TK's are forgotten
set g_teamautojoin					"0" //force players to autojoin on connect, instead of letting them spec untill they join themselves
set g_teamForceBalance				"1" //if on, you can't join a team when it has more players then the other
set g_maintainTeam					"1" //when switching maps, players will stay in their team
set g_teamnamered					"" //name for the red team, nothing = Red Dragons
set g_teamnameblue					"" //name for the red team, nothing = SWAT
set g_swaproles						"0" //When map is over, play it again with the teams swapped (recommended for bombmode). After that, change map. 0=change map immediatly when map is over, no swapping of teams
 
//*** Team Survivor/Bombmode/Follow the Leader Specific Settings ***
set g_maxrounds						"0" //number of rounds before map is over, 0=never
set g_RoundTime						"3" //maximum minutes a round can take
set g_survivorrule					"0" //0=teams don't get a point when time is up before everyone is dead. 1=team with most players left gets point
set g_suddendeath					"1" //when map is over and both teams have same amount of points, add another round
set g_bombdefusetime				"10" //seconds it takes to defuse bomb
set g_bombexplodetime				"40" //seconds before bomb goes off after planting
 
//*** Capture the flag Specific Settings ***
set g_flagreturntime				"30" //if a flag is dropped, return it after this amount of seconds
set g_hotpotato						"1" //when both flags are taken, they will explode after this amount of minutes

//*** Referees Settings ***
seta g_refNoBan                     "1"  // Referees cannot ban fellow gamers

 
//*** Advanced settings *** Dont change, unless you know what you are doing
set sv_strictauth					"0" //1=check for valid cdkey, this means ioUrbanTerror players will not be able to join
set sv_pure							"1" //dont let players load modified pk3-files
set sv_cheats						"0"
set sv_maxRate						"0" //maximum traffic per second the server will send per client. 25000 or 0 = max
set sv_timeout						"90" //time in seconds before player with a interupted connection will be kicked
set g_inactivity					"90" //time in seconds before a non-moving player will be kicked
set g_gravity						"800"
set g_knockback						"1000"
set g_syncronousClients				"0"
set g_bulletPredictionThreshold		"5"
set g_allowBulletPrediction			"1"
set pmove_fixed						"1"
set pmove_msec						"8"
set g_removeBodyTime				"10"  // Time in seconds for dead bodies to fade away

//*** Master Servers *** Servers the server will report to if 'dedicated' is set to 2. When set to 1, it doesn't report.
set sv_master1						"" //This one will be set automatically by the game-engine, so just leave it blank
set sv_master2						"master.urbanterror.info"
set sv_master3						"master2.urbanterror.info"
set sv_master4						"master.quake3arena.com"
set sv_master5						""
 
//*** Other Settings ***
set g_armbands						"0" //determines the behaviour of the armbandcolor (also shows on playerlist and minimap). 0=player's choice, set with cg_rgb 1=Based on teamcolor (red or blue) 2=assigned by server (random)
set sv_maxping						"130" //max ping a client may have when connecting to the server
set sv_minping						"0" //min ping a client may have when connecting to the server
set g_allowchat						"2" //0= no chatting at all 1=teamchats only 2=all chats
set g_log							"log/games.log" //name of the logfile. Empty ("") means no log. Log will be in the q3ut4 folder in windows. Linux uses ~/.q3a/q3ut4
set g_logsync						"1" //enables/disables direct writing to the log file instead of buffered
set g_loghits						"0" //log every single hit. Creates very big logs
set g_logroll						"0" //create new log every now and then, instead of always using the same one
set logfile							"0" //additional logging in seperate qconsole.log file. 1=buffered, 2=synced
set g_cahtime						"60" //Interval in seconds of awarding points for flags in Capture and Hold gamemode
 
//*** Anti Cheat ***
//pb_sv_enable //to enable PB, remove the // at the beginning of this line (only works when using Quake 3 Arena, not ioUrbanTerror)
set sv_battleye						"0" //Keep this disabled, BattlEye is dead

//*** Map Rotation ***
map ut4_turnpike //what map to start with


//**************************************************************************//
//																			//
//					Global config for all server							//
//																			//
//**************************************************************************//

//Example config. Note that everything behind // is ignored by the game
//Try to keep cvar-values as short as possible. Otherwise you might get "info string length exceeded" errors on your server
 
//*** Administrator Info, shows in some gamebrowsers ***
sets " Admin" "adminname" //Uses a space in front so it shows up at the top of the properties list
sets " Email" "xxx@xxx.xxx"
 
//*** Server Name and Daily Message ***
set sv_hostname						"[NEW] Holblin and Asche server" //Your servername here
set g_motd							"http://www.unity-team.org" //Your message of the day here, it is displayed while connecting
set sv_joinmessage					"Welcome to Asche & Holblin server" //Your joinmessage here, it is displayed when the game is joined
 
//*** General Game Settings ***
set sv_maxclients					"16" //max clientslots available on the server, using more than 16 is not advised. It can cause lag and most maps are not built for it. Going over 24 can cause nasty bugs.
set g_maxGameClients				"0" //max clients that can actually join the game. Other clients are forced to spectate. 0=all
set sv_privateClients				"4" //Amount of private slots. This amount of slots will be reserved for players who enter the right privatepassword
set g_gametype						"4" //0=FreeForAll, 3=TeamDeathMatch, 4=Team Survivor, 5=Follow the Leader, 6=Capture and Hold, 7=Capture The Flag, 8=Bombmode
sets sv_dlURL						"maps.xtr3m.net" //Sets the address for auto-downloading. Auto-download only works on ioUrbanTerror-clients, not quake3-clients. The client will try to download <sv_dlURL>/q3ut4/mapname.pk3. So if your server is running ut4_coolmap and sv_dlURL is set to 'yoursite.com/maps', make sure the maps is hosted at http://www.yoursite.com/maps/q3ut4/ut4_coolmap.pk3. Leaving this set 'urbanterror.info' will make it use a map mirror with the most common maps on it. If you got your own hosting, please us that though, to save bandwith.
 
//*** Passwords ***
set rconpassword					"encoredutravail!" //Password to control the server remotely using rcon.
set sv_privatePassword				"unityclan" //password for private slots
set g_password						"" //password for the server. Nothing = public
 
//*** Limits/times ***
set timelimit						"20" //time in minutes before map is over, 0=never
set fraglimit						"0" //amount of points to be scored before map is over, 0=never
set capturelimit					"12" //amount of flagcaps before map is over, 0=never
set g_warmup						"15" //time in seconds before game starts when changed to a new map. Gives slower computers time to load before game starts
 
//*** Respawning *** (FFA, TDM, CAH, CTF)
set g_respawnDelay					"15" //seconds before respawn, ignored when g_waverespawns is 1
set g_forcerespawn					"20" //seconds before respawn is forced, even when plater did not press fire
set g_waverespawns					"1" //use waverespawns, meaning everybody in a team respawns at the same time
set g_bluewave						"15" //seconds between blue waverespawns, ignored when g_waverespawns is 0
set g_redwave						"15" //seconds between red waverespawns, ignored when g_waverespawns is 0
set g_respawnProtection				"2" //amount of seconds a spawning players is protected from damage
 
//*** Rules ***
set g_deadchat						"1" //Determines if alive players can see dead players message. 0=living players can not see dead players chat 1=living players see only team-messages from dead teammembers 2=living players also see normal chats from dead players
set g_antiwarp						"1" //enable or disable antiwarp. This option smooths the movement of warping players (warping is caused by a crappy connection, for instance when torrenting during playing). The warping player will experience stutters when this is enabled
set g_antiwarptol					"50" //tolerance of the antiwarp. Higher = more tolerant. 50=default
set g_gear							"0" //bitmask that decides which votes are allowed and which not. Check http://www.urbanterror.info/gear_calc.html to find the correct number
set g_allowvote						"536871039" //bitmask that decides which votes are allowed and which not. Check http://www.urbanterror.info/allowvote_calc.html to find the correct number
set g_failedvotetime				"300" //time in seconds before someone can call another vote after another has failed
set g_followstrict					"1" //1=no haunting of enemies when dead
set sv_floodprotect					"1" //1=stops clients from spamming many chatlines
 
//*** Matchmode ***
set g_matchmode						"0" //matchmode is for matchplay. Features timeouts and ready-commands
set g_timeouts						"3" //ammount of timeouts that a team can do per map
set g_timeoutlength					"240" //length of the timeout
set g_pauselength					"0" //length of a pause. This can only be done by rcon. 0=indefinatly
 
//*** Team Game Settings ***
set g_friendlyFire					"1" //0=no friendlyfire 1=friendlyfire on, kick after too many TK's 2=friendlyfire on, no kicks
set g_maxteamkills					"3" //amount of TK's before you get kicked when friendlyfire is 1
set g_teamkillsforgettime 			"300" //amount of seconds before TK's are forgotten
set g_teamautojoin					"0" //force players to autojoin on connect, instead of letting them spec untill they join themselves
set g_teamForceBalance				"1" //if on, you can't join a team when it has more players then the other
set g_maintainTeam					"1" //when switching maps, players will stay in their team
set g_teamnamered					"" //name for the red team, nothing = Red Dragons
set g_teamnameblue					"" //name for the red team, nothing = SWAT
set g_swaproles						"0" //When map is over, play it again with the teams swapped (recommended for bombmode). After that, change map. 0=change map immediatly when map is over, no swapping of teams
 
//*** Team Survivor/Bombmode/Follow the Leader Specific Settings ***
set g_maxrounds						"0" //number of rounds before map is over, 0=never
set g_RoundTime						"3" //maximum minutes a round can take
set g_survivorrule					"0" //0=teams don't get a point when time is up before everyone is dead. 1=team with most players left gets point
set g_suddendeath					"1" //when map is over and both teams have same amount of points, add another round
set g_bombdefusetime				"10" //seconds it takes to defuse bomb
set g_bombexplodetime				"40" //seconds before bomb goes off after planting
 
//*** Capture the flag Specific Settings ***
set g_flagreturntime				"30" //if a flag is dropped, return it after this amount of seconds
set g_hotpotato						"1" //when both flags are taken, they will explode after this amount of minutes

//*** Referees Settings ***
seta g_refNoBan                     "1"  // Referees cannot ban fellow gamers

 
//*** Advanced settings *** Dont change, unless you know what you are doing
set sv_strictauth					"0" //1=check for valid cdkey, this means ioUrbanTerror players will not be able to join
set sv_pure							"1" //dont let players load modified pk3-files
set sv_cheats						"0"
set sv_maxRate						"0" //maximum traffic per second the server will send per client. 25000 or 0 = max
set sv_timeout						"90" //time in seconds before player with a interupted connection will be kicked
set g_inactivity					"90" //time in seconds before a non-moving player will be kicked
set g_gravity						"800"
set g_knockback						"1000"
set g_syncronousClients				"0"
set g_bulletPredictionThreshold		"5"
set g_allowBulletPrediction			"1"
set pmove_fixed						"1"
set pmove_msec						"8"
set g_removeBodyTime				"10"  // Time in seconds for dead bodies to fade away

//*** Master Servers *** Servers the server will report to if 'dedicated' is set to 2. When set to 1, it doesn't report.
set sv_master1						"" //This one will be set automatically by the game-engine, so just leave it blank
set sv_master2						"master.urbanterror.info"
set sv_master3						"master2.urbanterror.info"
set sv_master4						"master.quake3arena.com"
set sv_master5						""
 
//*** Other Settings ***
set g_armbands						"0" //determines the behaviour of the armbandcolor (also shows on playerlist and minimap). 0=player's choice, set with cg_rgb 1=Based on teamcolor (red or blue) 2=assigned by server (random)
set sv_maxping						"130" //max ping a client may have when connecting to the server
set sv_minping						"0" //min ping a client may have when connecting to the server
set g_allowchat						"2" //0= no chatting at all 1=teamchats only 2=all chats
set g_log							"log/games.log" //name of the logfile. Empty ("") means no log. Log will be in the q3ut4 folder in windows. Linux uses ~/.q3a/q3ut4
set g_logsync						"1" //enables/disables direct writing to the log file instead of buffered
set g_loghits						"0" //log every single hit. Creates very big logs
set g_logroll						"0" //create new log every now and then, instead of always using the same one
set logfile							"0" //additional logging in seperate qconsole.log file. 1=buffered, 2=synced
set g_cahtime						"60" //Interval in seconds of awarding points for flags in Capture and Hold gamemode
 
//*** Anti Cheat ***
//pb_sv_enable //to enable PB, remove the // at the beginning of this line (only works when using Quake 3 Arena, not ioUrbanTerror)
set sv_battleye						"0" //Keep this disabled, BattlEye is dead

//*** Map Rotation ***
map ut4_turnpike //what map to start with
