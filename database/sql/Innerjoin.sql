SELECT search, first_name, last_name, user_id from histories INNER JOIN users
ON histories.user_id = users.id;