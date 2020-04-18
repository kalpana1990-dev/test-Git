echo "hii";

echo "new file here for testing";

echo "learnig amenmd and soft";


echo "brach test";

UPDATE
  event_results evnr
SET
  details = tmp_data.default_event_results_details
FROM (
      SELECT 
      er.id,
      er.default_event_result_ids,
      er.details event_results,
    der.details default_event_results_details,
    er.cid 
  FROM 
    event_results er
  JOIN default_event_results der ON ( der.id = ANY ( er.default_event_result_ids ) AND er.deleted_on IS NULL )
  WHERE 
    er.is_system is true
    AND  er.details is NULL
 ) AS tmp_data  
WHERE
  evnr.id = tmp_data.id
  AND evnr.cid = tmp_data.cid;
