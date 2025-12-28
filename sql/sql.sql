-- challange 1 
SELECT c.user_id , COUNT(s.id) , 
(SELECT COUNT(*) from seances WHERE statut ='reservee')*100 / 
(SELECT COUNT(*) from seances) 
from coachs c 
INNER JOIN seances s ON s.coach_id = c.user_id 
GROUP BY c.user_id 
HAVING COUNT(s.id) >= 3;

-- challange 2



--challange 3
SELECT DISTINCT u.nom, u.prenom, s1.date_seance, s1.heure, ADDTIME(s1.heure, SEC_TO_TIME(s1.duree * 60)) AS fin FROM seances s1 
INNER JOIN seances s2 ON s1.coach_id = s2.coach_id AND s1.date_seance = s2.date_seance AND s1.id <> s2.id AND s1.heure < ADDTIME(s2.heure, SEC_TO_TIME(s2.duree * 60)) AND ADDTIME(s1.heure, SEC_TO_TIME(s1.duree * 60)) > s2.heure
INNER JOIN users u ON u.id = s1.coach_id;


-- challange 4
SELECT u.nom , u.prenom, r.reserved_at FROM users u 
INNER JOIN coachs c ON c.user_id = u.id 
INNER JOIN seances s ON s.coach_id = u.id
INNER JOIN reservations r ON r.seance_id = s.id 
WHERE r.reserved_at <= CURRENT_DATE - INTERVAL 60 day ;

-- challange 5 
SELECT u.nom, u.prenom, c.discipline, COUNT(r.id) , RANK() OVER(PARTITION BY discipline ORDER BY COUNT(r.id) DESC) AS rank
FROM  coachs c INNER JOIN users u ON u.id = c.user_id
LEFT JOIN seances s ON s.coach_id = c.user_id
LEFT JOIN reservations r ON r.seance_id = s.id
GROUP BY c.discipline;

-- challange 6
SELECT u.nom , u.prenom , COUNT(u.nom) AS rese FROM users u INNER JOIN reservations r ON r.sportif_id = u.id INNER JOIN seances s ON s.id = r.seance_id 
WHERE TIMESTAMPDIFF(HOUR, r.reserved_at, s.date_seance) < 24 GROUP BY u.nom;

-- challange 7