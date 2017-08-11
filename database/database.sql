CREATE TABLE users (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    firstname VARCHAR(100) NOT NULL,
    lastname VARCHAR(100) NOT NULL,
    email VARCHAR(255) NOT NULL,
    phone VARCHAR(100) NULL,
    password VARCHAR(255) NOT NULL,
    remember_token VARCHAR(255) NULL,
    team_id INT(20) unsigned NULL,
    status VARCHAR(50) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT UC_USERS UNIQUE(email),
    CONSTRAINT PK_USERS PRIMARY KEY (id)
);

CREATE TABLE leagues (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    week_id INT(20) unsigned NULL,
    user_id INT(20) unsigned NOT NULL, 
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_LEAGUES PRIMARY KEY (id),
    CONSTRAINT FK_LEAGUE_OWNER FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT FK_CURRENT_WEEK FOREIGN KEY (week_id) REFERENCES weeks(id)
);

CREATE TABLE seasons (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    league_id INT(20) unsigned NOT NULL,
    year VARCHAR(4) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_SEASONS PRIMARY KEY (id),
    CONSTRAINT FK_SEASON_LEAGUE FOREIGN KEY (league_id) REFERENCES leagues(id)
);

ALTER TABLE leagues ADD CONSTRAINT FK_LEAGUE_ACTIVE_SEASON FOREIGN KEY (season_id) REFERENCES seasons(id);

CREATE TABLE week_types (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_WEEK_TYPES PRIMARY KEY (id)
);

CREATE TABLE weeks (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    nflweek VARCHAR(10) NULL,
    number VARCHAR(2) NOT NULL,
    season_id INT(20) unsigned NOT NULL,
    type_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_WEEKS PRIMARY KEY (id),
    CONSTRAINT FK_WEEK_SEASON FOREIGN KEY (season_id) REFERENCES seasons(id),
    CONSTRAINT FK_WEEK_TYPE FOREIGN KEY (type_id) REFERENCES week_types(id)
);

CREATE TABLE week_stats (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    player_id INT(20) unsigned NOT NULL,
    week_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_WEEK_STATS PRIMARY KEY (id),
    CONSTRAINT FK_PLAYER_STATS FOREIGN KEY (player_id) REFERENCES players(id),
    CONSTRAINT FK_WEEK_STAT_WEEK FOREIGN KEY (week_id) REFERENCES weeks(id)
);

CREATE TABLE teams (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    mascot VARCHAR(50) NOT NULL,
    user_id INT(20) unsigned NOT NULL,
    roster_id INT(20) unsigned NULL,
    league_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_TEAMS PRIMARY KEY (id),
    CONSTRAINT FK_TEAM_OWNER FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT FK_TEAM_LEAGUE FOREIGN KEY (league_id) REFERENCES leagues(id)
);

CREATE TABLE rosters (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    team_id INT(20) unsigned NOT NULL,
    week_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_ROSTERS PRIMARY KEY (id),
    CONSTRAINT FK_ROSTER_WEEK FOREIGN KEY (week_id) REFERENCES weeks(id),
    CONSTRAINT FK_ROSTER_TEAM FOREIGN KEY (team_id) REFERENCES teams(id)
);

ALTER TABLE teams ADD CONSTRAINT FK_TEAM_ACTIVE_ROSTER FOREIGN KEY (roster_id) REFERENCES rosters(id);
ALTER TABLE users ADD CONSTRAINT FK_USER_ACTIVE_TEAM FOREIGN KEY (team_id) REFERENCES teams(id);

CREATE TABLE players (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    league_id INT(20) unsigned NOT NULL,
    player_data_id INT(20) unsigned NOT NULL,
    team_id INT(20) unsigned NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_PLAYERS PRIMARY KEY (id),
    CONSTRAINT FK_LEAGUE_PLAYER FOREIGN KEY (league_id) REFERENCES leagues(id),
    CONSTRAINT FK_TEAM_PLAYER FOREIGN KEY (team_id) REFERENCES teams(id)
);

CREATE TABLE positions (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    requirements VARCHAR(255) NULL,
    starter BOOLEAN NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_POSITIONS PRIMARY KEY (id)
);

CREATE TABLE roster_players (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    player_id INT(20) unsigned NOT NULL,
    roster_id INT(20) unsigned NOT NULL,
    week_stat_id INT(20) unsigned NULL,
    position_id INT(20) unsigned NOT NULL,
    place INT(4) NULL,
    score INT(5) NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_ROSTER_PLAYERS PRIMARY KEY (id),
    CONSTRAINT FK_ROSTER_REF FOREIGN KEY (roster_id) REFERENCES rosters(id),
    CONSTRAINT FK_ROSTER_POSITION FOREIGN KEY (position_id) REFERENCES positions(id),
    CONSTRAINT FK_ROSTER_PLAYER_STATS FOREIGN KEY (week_stat_id) REFERENCES week_stats(id)
);

CREATE TABLE message_types (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_MESSAGE_TYPES PRIMARY KEY (id)
);

CREATE TABLE messages (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    subject VARCHAR(255) NOT NULL,
    content LONGTEXT NOT NULL,
    user_id INT(20) unsigned NOT NULL,
    commentable BOOLEAN NOT NULL,
    message_id INT(20) unsigned NULL,
    type_id INT(20) unsigned NOT NULL,
    league_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_MESSAGES PRIMARY KEY (id),
    CONSTRAINT FK_MESSAGE_SENDER FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT FK_MESSAGE_PARENT FOREIGN KEY (message_id) REFERENCES messages(id),
    CONSTRAINT FK_MESSAGE_TYPE FOREIGN KEY (type_id) REFERENCES message_types(id),
    CONSTRAINT FK_MESSAGE_LEAGUE FOREIGN KEY (league_id) REFERENCES leagues(id)
);

CREATE TABLE message_recipients (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    message_id INT(20) unsigned NOT NULL,
    user_id INT(20) unsigned NOT NULL,
    isread BOOLEAN NOT NULL,
    starred BOOLEAN NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    deleted_at TIMESTAMP NULL,
    CONSTRAINT PK_MESSAGE_RECIPIENTS PRIMARY KEY (id),
    CONSTRAINT FK_MESSAGE_REF FOREIGN KEY (message_id) REFERENCES messages(id),
    CONSTRAINT FK_MESSAGE_RECIPIENT FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE stat_types (
    id INT(20) unsigned NOT NULL,
    name VARCHAR(255) NOT NULL,
    short VARCHAR(10) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_STAT_TYPES PRIMARY KEY (id)
);

CREATE TABLE stats (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    week_stat_id INT(20) unsigned NOT NULL,
    type_id INT(20) unsigned NOT NULL,
    value INT(20) NOT NULL,
    points INT(20) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_STATS PRIMARY KEY (id),
    CONSTRAINT FK_WEEK_STAT_ID FOREIGN KEY (week_stat_id) REFERENCES week_stats(id),
    CONSTRAINT FK_STAT_TYPES_ID FOREIGN KEY (type_id) REFERENCES stat_types(id)
);

CREATE TABLE comments (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    user_id INT(20) unsigned NOT NULL,
    reference_type VARCHAR(255) NOT NULL,
    reference_id INT(20) unsigned NOT NULL,
    content LONGTEXT NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_COMMENTS PRIMARY KEY (id),
    CONSTRAINT FK_COMMENT_SENDER FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE chat_types (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_CHAT_TYPES PRIMARY KEY (id)
);

CREATE TABLE chats (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    type_id INT(20) unsigned NOT NULL,
    league_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_CHATS PRIMARY KEY (id),
    CONSTRAINT FK_CHAT_TYPE FOREIGN KEY (type_id) REFERENCES chat_types(id),
    CONSTRAINT FK_CHAT_LEAGUE FOREIGN KEY (league_id) REFERENCES leagues(id)
);

CREATE TABLE chat_users (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    chat_id INT(20) unsigned NOT NULL,
    user_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_CHAT_USERS PRIMARY KEY (id),
    CONSTRAINT FK_CHAT_USER_CHAT FOREIGN KEY (chat_id) REFERENCES chats(id),
    CONSTRAINT FK_CHAT_USER FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE trades (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    team_id INT(20) unsigned NOT NULL,
    league_id INT(20) unsigned NOT NULL,
    closes DATETIME NOT NULL,
    accepted BOOLEAN NULL,
    approved BOOLEAN NULL,
    block BOOLEAN NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_TRADES PRIMARY KEY (id),
    CONSTRAINT FK_TRADE_INITIATOR FOREIGN KEY (team_id) REFERENCES teams(id),
    CONSTRAINT FK_TRADE_LEAGUE FOREIGN KEY (league_id) REFERENCES leagues(id)
);

CREATE TABLE tradeables (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    trade_id INT(20) unsigned NOT NULL,
    tradeable_type VARCHAR(255) NOT NULL,
    tradeable_id INT(20) unsigned NOT NULL,
    team_id INT(20) unsigned NULL,
    accept BOOLEAN NULL,
    CONSTRAINT PK_TRADEABLE PRIMARY KEY (id),
    CONSTRAINT FK_TRADEABLE_TEAM FOREIGN KEY (team_id) REFERENCES teams(id),
    CONSTRAINT FK_TRADEABLE_TRADE FOREIGN KEY (trade_id) REFERENCES trades(id)
);

CREATE TABLE week_standings (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    team_id INT(20) unsigned NOT NULL,
    week_id INT(20) unsigned NOT NULL,
    rank INT(4) NULL,
    description LONGTEXT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_WEEK_STANDINGS PRIMARY KEY (id),
    CONSTRAINT FK_STANDING_TEAM FOREIGN KEY (team_id) REFERENCES teams(id),
    CONSTRAINT FK_STANDING_WEEK FOREIGN KEY (week_id) REFERENCES weeks(id)
);

CREATE TABLE rule_types (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_RULE_TYPES PRIMARY KEY (id)
);

CREATE TABLE rules (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    league_id INT(20) unsigned NOT NULL,
    subject VARCHAR(100) NULL,
    description LONGTEXT NOT NULL,
    number INT(4) unsigned NOT NULL,
    rule_id INT(20) unsigned NULL,
    type_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_RULES PRIMARY KEY (id),
    CONSTRAINT FK_RULE_PARENT FOREIGN KEY (rule_id) REFERENCES rules(id),
    CONSTRAINT FK_LEAUGE_RULE FOREIGN KEY (league_id) REFERENCES leagues(id),
    CONSTRAINT FK_RULE_TYPE FOREIGN KEY (type_id) REFERENCES rule_types(id)
);

CREATE TABLE setting_categories (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_SETTING_CATEGORIES PRIMARY KEY (id)
);

CREATE TABLE setting_types (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_SETTING_TYPES PRIMARY KEY (id)
);

CREATE TABLE settings (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    league_id INT(20) unsigned NOT NULL,
    type_id INT(20) unsigned NOT NULL,
    category_id INT(20) unsigned NOT NULL,
    name VARCHAR(100) NOT NULL,
    value LONGTEXT NULL,
    description VARCHAR(255) NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_SETTINGS PRIMARY KEY (id),
    CONSTRAINT FK_LEAGUE_SETTING FOREIGN KEY (league_id) REFERENCES leagues(id),
    CONSTRAINT FK_SETTING_TYPE FOREIGN KEY (type_id) REFERENCES setting_types(id),
    CONSTRAINT FK_SETTING_CATEGORY FOREIGN KEY (category_id) REFERENCES setting_categories(id)
);

CREATE TABLE poll_types (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_POLL_TYPES PRIMARY KEY (id)
);

CREATE TABLE polls (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    user_id INT(20) unsigned NOT NULL,
    league_id INT(20) unsigned NOT NULL,
    subject VARCHAR(100) NOT NULL,
    description LONGTEXT NOT NULL,
    closes DATETIME NOT NULL,
    multi BOOLEAN NOT NULL,
    hiddenuser BOOLEAN NOT NULL,
    commentable BOOLEAN NOT NULL,
    reference_type VARCHAR(255) NULL,
    reference_id INT(20) unsigned NULL,
    type_id INT(20) unsigned NOT NULL, 
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_POLLS PRIMARY KEY (id),
    CONSTRAINT FK_POLL_OWNER FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT FK_POLL_TYPE FOREIGN KEY (type_id) REFERENCES poll_types(id)
);

CREATE TABLE poll_questions (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    poll_id INT(20) unsigned NOT NULL,
    description LONGTEXT NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_TABLENAME PRIMARY KEY (id),
    CONSTRAINT FK_QUESTION_POLL FOREIGN KEY (poll_id) REFERENCES polls(id)
);

CREATE TABLE poll_responses (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    user_id INT(20) unsigned NOT NULL,
    poll_question_id INT(20) unsigned NOT NULL,
    response VARCHAR(255) NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_POLL_RESPONSES PRIMARY KEY (id),
    CONSTRAINT FK_POLL_USER FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT FK_POLL_ANSWER FOREIGN KEY (poll_question_id) REFERENCES poll_questions(id)
);

CREATE TABLE draft_pick_types (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_DRAFT_PICK_TYPES PRIMARY KEY (id)
);

CREATE TABLE drafts (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    league_id INT(20) unsigned NOT NULL,
    season_id INT(20) unsigned NOT NULL,
    rounds INT(20) unsigned NOT NULL,
    keepers INT(4) unsigned NOT NULL,
    date DATETIME NULL,
    type VARCHAR(50) NULL,
    time VARCHAR(10) NULL,
    completed BOOLEAN,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_DRAFTS PRIMARY KEY (id),
    CONSTRAINT FK_LEAGUE_DRAFT FOREIGN KEY (league_id) REFERENCES leagues(id),
    CONSTRAINT FK_DRAFT_SEASON FOREIGN KEY (season_id) REFERENCES seasons(id)
);

CREATE TABLE draft_picks (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    draft_id INT(20) unsigned NOT NULL,
    team_id INT(20) unsigned NOT NULL,
    owner_id INT(20) unsigned NOT NULL,
    round INT(4) unsigned NOT NULL,
    number INT(4) unsigned NULL,
    overall INT(4) unsigned NULL,
    player_id INT(20) unsigned NULL,
    type_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_DRAFT_PICKS PRIMARY KEY (id),
    CONSTRAINT FK_DRAFT_PICK_DRAFT FOREIGN KEY (draft_id) REFERENCES drafts(id),
    CONSTRAINT FK_DRAFT_PICK_OWNER FOREIGN KEY (team_id) REFERENCES teams(id),
    CONSTRAINT FK_DRAFT_PICK_TYPE FOREIGN KEY (type_id) REFERENCES draft_pick_types(id)
);

CREATE TABLE activity_types (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_ACTIVITY_TYPES PRIMARY KEY (id)
);

CREATE TABLE activities (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    subject VARCHAR(100) NOT NULL,
    description LONGTEXT NOT NULL,
    league_id INT(20) unsigned NOT NULL,
    reference_type VARCHAR(255) NULL,
    reference_id int(20) unsigned NULL,
    reference_uri VARCHAR(255) NULL,
    type_id INT(20) unsigned NOT NULL,
    user_id INT(20) unsigned NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_ACTIVITIES PRIMARY KEY (id),
    CONSTRAINT FK_ACTIVITY_LEAGUE FOREIGN KEY (league_id) REFERENCES leagues(id),
    CONSTRAINT FK_ACTIVITY_TYPE FOREIGN KEY (type_id) REFERENCES activity_types(id)
);

CREATE TABLE alerts (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    subject VARCHAR(100) NOT NULL,
    description LONGTEXT NOT NULL,
    active BOOLEAN NOT NULL,
    league_id INT(20) unsigned NULL,
    reference_uri VARCHAR(255) NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_ALERTS PRIMARY KEY (id),
    CONSTRAINT FK_LEAGUE_ALERT FOREIGN KEY (league_id) REFERENCES leagues(id)
);

CREATE TABLE request_types (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_REQUEST_TYPES PRIMARY KEY (id)
);

CREATE TABLE requests (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    subject VARCHAR(100) NOT NULL,
    description LONGTEXT NOT NULL,
    user_id INT(20) unsigned NOT NULL,
    league_id INT(20) unsigned NOT NULL,
    status VARCHAR(100) NULL,
    reference_type VARCHAR(100) NULL,
    reference_id INT(20) unsigned NULL,
    type_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_REQUESTS PRIMARY KEY (id),
    CONSTRAINT FK_REQUEST_USER FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT FK_REQUEST_TYPE FOREIGN KEY (type_id) REFERENCES request_types(id),
    CONSTRAINT FK_REQUEST_LEAGUE FOREIGN KEY (league_id) REFERENCES leagues(id)
);

CREATE TABLE request_updates (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    request_id INT(20) unsigned NOT NULL,
    user_id INT(20) unsigned NOT NULL,
    subject VARCHAR(100) NOT NULL,
    description LONGTEXT NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_REQUEST_UPDATES PRIMARY KEY (id),
    CONSTRAINT FK_UPDATE_REQUEST FOREIGN KEY (request_id) REFERENCES requests(id),
    CONSTRAINT FK_REQUEST_UPDATER FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE event_types (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_EVENT_TYPES PRIMARY KEY (id)
);

CREATE TABLE events (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    subject VARCHAR(100) NOT NULL,
    description LONGTEXT NULL,
    start DATETIME NOT NULL,
    end DATETIME NOT NULL,
    league_id INT(20) unsigned NOT NULL,
    type_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_EVENTS PRIMARY KEY (id),
    CONSTRAINT FK_EVENT_TYPE FOREIGN KEY (type_id) REFERENCES event_types(id)
);

CREATE TABLE matchup_types (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(100) NOT NULL,
    description VARCHAR(255) NULL DEFAULT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_MATCHUP_TYPES PRIMARY KEY (id)
);

CREATE TABLE matchups (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    league_id INT(20) unsigned NOT NULL,
    season_id INT(20) unsigned NOT NULL,
    week_id INT(20) unsigned NOT NULL,
    type_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_MATCHUPS PRIMARY KEY (id),
    CONSTRAINT FK_MATCHUP_LEAGUE FOREIGN KEY (league_id) REFERENCES leagues(id),
    CONSTRAINT FK_MATCHUP_SEASON FOREIGN KEY (season_id) REFERENCES seasons(id),
    CONSTRAINT FK_MATCHUP_WEEK FOREIGN KEY (week_id) REFERENCES weeks(id),
    CONSTRAINT FK_MATCHUP_TYPE FOREIGN KEY (type_id) REFERENCES matchup_types(id)
);

CREATE TABLE matchup_teams (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    matchup_id INT(20) unsigned NOT NULL,
    team_id INT(20) unsigned NOT NULL,
    score INT(20) NULL,
    win BOOLEAN NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_MATCHUP_TEAMS PRIMARY KEY (id),
    CONSTRAINT FK_TEAM_MATCHUP FOREIGN KEY (matchup_id) REFERENCES matchups(id),
    CONSTRAINT FK_MATCHUP_TEAM FOREIGN KEY (team_id) REFERENCES teams(id)
);

CREATE TABLE permissions (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    user_id INT(20) unsigned NOT NULL,
    league_id INT(20) unsigned NOT NULL,
    value VARCHAR(10) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_PERMISSIONS PRIMARY KEY (id),
    CONSTRAINT FK_USER_PERMISSIONS FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT FK_USER_PERMISSIONS_LEAGUE FOREIGN KEY (league_id) REFERENCES leagues(id)
);

CREATE TABLE ir_eligibles (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    player_id INT(20) unsigned NOT NULL,
    comments LONGTEXT NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_IR_ELIGIBLES PRIMARY KEY (id),
    CONSTRAINT FK_IR_PLAYER FOREIGN KEY (player_id) REFERENCES players(id)
);

CREATE TABLE waivers (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    player_id INT(20) unsigned NOT NULL,
    team_id INT(20) unsigned NOT NULL,
    preferred_date DATETIME NOT NULL,
    clear_date DATETIME NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_WAIVERS PRIMARY KEY (id),
    CONSTRAINT FK_PREFERRED_TEAM FOREIGN KEY (team_id) REFERENCES teams(id),
    CONSTRAINT FK_WAIVER_PLAYER FOREIGN KEY (player_id) REFERENCES players(id)
);

CREATE TABLE wavier_orders(
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    team_id INT(20) unsigned NOT NULL,
    week_id INT(20) unsigned NOT NULL,
    position INT(4) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_WAIVER_ORDERS PRIMARY KEY (id),
    CONSTRAINT FK_WAIVER_TEAM FOREIGN KEY (team_id) REFERENCES teams(id),
    CONSTRAINT FK_WAIVER_WEEK FOREIGN KEY (week_id) REFERENCES weeks(id)
);

CREATE TABLE waiver_claims(
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    team_id INT(20) unsigned NOT NULL,
    waiver_id INT(20) unsigned NOT NULL,
    position INT(4) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_WAIVER_ORDERS PRIMARY KEY (id),
    CONSTRAINT FK_WAIVER_CLAIM_TEAM FOREIGN KEY (team_id) REFERENCES teams(id),
    CONSTRAINT FK_WAIVER_CLAIM FOREIGN KEY (waiver_id) REFERENCES waivers(id)
);

CREATE TABLE divisions (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    name VARCHAR(50) NOT NULL,
    season_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_DIVISIONS PRIMARY KEY (id),
    CONSTRAINT FK_DIVISION_SEASON FOREIGN KEY (season_id) REFERENCES seasons(id)
);

CREATE TABLE division_teams(
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    team_id INT(20) unsigned NOT NULL,
    division_id INT(20) unsigned NOT NULL,
    CONSTRAINT PK_DIVISION_TEAMS PRIMARY KEY (id),
    CONSTRAINT FK_DIVISION_TEAM FOREIGN KEY (team_id) REFERENCES teams(id),
    CONSTRAINT FK_TEAM_DIVISION FOREIGN KEY (division_id) REFERENCES divisions(id)
);

CREATE TABLE activityables(
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    activity_id INT(20) unsigned NOT NULL,
    activityable_id INT(20) NOT NULL,
    activityable_type VARCHAR(100) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_DIVISION_TEAMS PRIMARY KEY (id)
);

CREATE TABLE password_resets (
    email VARCHAR(255) NOT NULL,
    token VARCHAR(255) NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL
);

CREATE TABLE oauth_clients (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    user_id INT(20) unsigned NULL,
    name VARCHAR(255) NOT NULL,
    secret VARCHAR(255) NOT NULL,
    redirect MEDIUMTEXT NOT NULL,
    personal_access_client BOOLEAN NOT NULL,
    password_client BOOLEAN NOT NULL,
    revoked BOOLEAN NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_OAUTH_CLIENTS PRIMARY KEY (id),
    CONSTRAINT FK_USER_OAUTH_CLIENT FOREIGN KEY (user_id) REFERENCES users(id)
);

CREATE TABLE oauth_access_tokens (
    id VARCHAR(100) NOT NULL,
    user_id int(20) unsigned NULL,
    client_id INT(20) unsigned NOT NULL,
    name VARCHAR(255) NULL,
    scopes LONGTEXT NULL,
    revoked BOOLEAN NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    expires_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_OAUTH_ACCESS_TOKENS PRIMARY KEY (id),
    CONSTRAINT FK_USER_ACCESS_TOKEN FOREIGN KEY (user_id) REFERENCES users(id),
    CONSTRAINT FK_OAUTH_TOKEN_CLIENT FOREIGN KEY (client_id) REFERENCES oauth_clients(id)
);

CREATE TABLE oauth_personal_access_clients (
    id INT(20) unsigned NOT NULL AUTO_INCREMENT,
    client_id INT(20) unsigned NOT NULL,
    created_at TIMESTAMP NULL DEFAULT NULL,
    updated_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_OAUTH_PERSONAL_ACCESS_TOKENS PRIMARY KEY (id),
    CONSTRAINT FK_PERSONAL_ACCESS_CLIENT FOREIGN KEY (client_id) REFERENCES oauth_clients(id)
);

CREATE TABLE oauth_refresh_tokens (
    id VARCHAR(100) NOT NULL,
    access_token_id VARCHAR(100) NOT NULL,
    revoked BOOLEAN NOT NULL,
    expires_at TIMESTAMP NULL DEFAULT NULL,
    CONSTRAINT PK_OAUTH_REFRESH_TOKENS PRIMARY KEY (id),
    CONSTRAINT FK_REFRESH_ACCESS_TOKEN FOREIGN KEY (access_token_id) REFERENCES oauth_access_tokens(id)
);