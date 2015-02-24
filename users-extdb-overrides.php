<?php

	if (!defined('QA_VERSION')) { // don't allow this page to be requested directly from browser
		header('Location: ../../');
		exit;
	}

	/**
	 * Override the Lower-level function to execute a query:
	 * we have to alter some specific DB queries so they work on multi-db setup
	 */
	function qa_db_query_execute($query) {

		/////////////////////////////////////// some experiments happening here...
		$query = str_replace("CONSTRAINT ".QA_MYSQL_USERS_PREFIX, "CONSTRAINT ", $query);

		if ($query == "SHOW TABLES") {
			// get rid of the dot in QA_MYSQL_USERS_PREFIX
			$users_db_name = substr(QA_MYSQL_USERS_PREFIX, 0, strlen(QA_MYSQL_USERS_PREFIX)-1);
			$query = "SELECT CONCAT('".QA_MYSQL_USERS_PREFIX."',table_name) FROM information_schema.tables WHERE table_schema = '".$users_db_name."' union select table_name from information_schema.tables where table_schema = '".QA_FINAL_MYSQL_DATABASE."'";
		}

		return qa_db_query_execute_base($query);

	}