## Решение 1 задачи 

```
SELECT
    u.id AS ID,
    CONCAT(u.first_name, ' ', u.last_name) AS Name,
    b1.author AS Author,
    GROUP_CONCAT(b1.name ORDER BY b1.id SEPARATOR ', ') AS Books
FROM
    users u
JOIN
    user_books ub1 ON u.id = ub1.user_id
JOIN
    books b1 ON ub1.book_id = b1.id
JOIN
    user_books ub2 ON u.id = ub2.user_id AND ub1.id != ub2.id
JOIN
    books b2 ON ub2.book_id = b2.id AND b1.author = b2.author
WHERE
    TIMESTAMPDIFF(YEAR, u.birthday, CURDATE()) BETWEEN 7 AND 17
    AND DATEDIFF(ub1.return_date, ub1.get_date) <= 14
    AND DATEDIFF(ub2.return_date, ub2.get_date) <= 14
GROUP BY
    u.id, b1.author
HAVING
    COUNT(DISTINCT b1.id) = 2;
