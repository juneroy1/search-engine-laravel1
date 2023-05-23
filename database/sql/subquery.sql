SELECT 
	first_name,
	last_name,
	creator_id AS creatorId,
	(SELECT first_name from users WHERE id = creatorId ) AS creator_name
FROM explorium.users;