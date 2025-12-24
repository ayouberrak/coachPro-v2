-- challange 1 
SELECT c.user_id , COUNT(s.id) , 
(SELECT COUNT(*) from seances WHERE statut ='reservee')*100 / 
(SELECT COUNT(*) from seances) 
from coachs c 
INNER JOIN seances s ON s.coach_id = c.user_id 
GROUP BY c.user_id 
HAVING COUNT(s.id) >= 3;

-- challange 2
