# users-extdb
Separate DBs for users/installations for question2answer.

With this plugin, you can have a separate DB for the users and organize better a multi-site setup: one DB per site and a shared users DB.

All DBs have to be on the same MySQL instance.

# HowTo

* Before installation, put this plugin in `qa-plugins` directory.
* Edit your qa-config.php: UNCOMMENT and set QA_MYSQL_USERS_PREFIX to the DB name, followed by a dot, like `usersdb.`.
* Install like usual.

