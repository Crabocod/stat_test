/* 1 */
SELECT u.*
FROM users u
JOIN users i ON u.invited_by_user_id = i.id
WHERE u.posts_qty > i.posts_qty;

/* 2 */
SELECT u.*
FROM users u
JOIN (
    SELECT group_id, MAX(posts_qty) AS max_posts
    FROM users
    GROUP BY group_id
) m ON u.group_id = m.group_id AND u.posts_qty = m.max_posts;

/* 3 */
SELECT g.*
FROM groups g
JOIN (
    SELECT group_id, COUNT(*) AS user_count
    FROM users
    GROUP BY group_id
    HAVING COUNT(*) > 10000
) c ON g.id = c.group_id;

/* 4 */
SELECT u.*
FROM users u
JOIN users i ON u.invited_by_user_id = i.id
WHERE u.group_id <> i.group_id;

/* 5 */
SELECT g.*, t.total_posts max_posts
FROM groups g
JOIN (
    SELECT group_id, SUM(posts_qty) AS total_posts
    FROM users
    GROUP BY group_id
    ORDER BY total_posts DESC LIMIT 1
) t ON g.id = t.group_id;