<?php
#Application name: PhpCollab
#Status page: 2
#Path by root: ../includes/initrequests.php

$initrequest["sorting"] = "SELECT *
FROM " . $tableCollab["sorting"] . " sor
";

$initrequest["services"] = "SELECT *
FROM " . $tableCollab["services"] . " serv
";

$initrequest["invoices_items"] = "SELECT invitem.*
FROM " . $tableCollab["invoices_items"] . " invitem
LEFT OUTER JOIN " . $tableCollab["invoices"] . " inv ON inv.id = invitem.invoice
";

$initrequest["invoices"] = "SELECT inv.*,pro.id,pro.name
FROM " . $tableCollab["invoices"] . " inv
LEFT OUTER JOIN " . $tableCollab["projects"] . " pro ON pro.id = inv.project
";

$initrequest["calendar"] = "SELECT cal.*,mem.email_work, mem.name 
FROM " . $tableCollab["calendar"] . " cal
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = cal.owner
";

$initrequest["notes"] = "SELECT note.id, note.project, note.owner, note.topic, note.subject, note.description, note.date, note.published, mem.id, mem.login, mem.name, mem.email_work
FROM " . $tableCollab["notes"] . " note
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = note.owner
LEFT OUTER JOIN " . $tableCollab["projects"] . " pro ON pro.id = note.project
";

$initrequest["logs"] = "SELECT log.id, log.login, log.password, log.ip, log.session, log.compt, log.last_visite, log.connected, mem.profil
FROM " . $tableCollab["logs"] . " log
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.login = log.login
";

$initrequest["notifications"] = "SELECT noti.*,mem.id,mem.login,mem.name,mem.email_work,mem.organization,mem.profil
FROM " . $tableCollab["notifications"] . " noti
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = noti.member
";

$initrequest["members"] = <<<SQL
SELECT
mem.id AS mem_id,
mem.organization AS mem_organization,
mem.login AS mem_login,
mem.name AS mem_name,
mem.title AS mem_title,
mem.email_work AS mem_email_work,
mem.email_home AS mem_email_home,
mem.phone_work AS mem_phone_work,
mem.phone_home AS mem_phone_home,
mem.mobile AS mem_mobile,
mem.fax AS mem_fax,
mem.comments AS mem_comments,
mem.profil AS mem_profile,
mem.created AS mem_created,
mem.logout_time AS mem_logout_time,
mem.last_page AS mem_last_page,
mem.timezone AS mem_timezone,
org.id AS org_id,
org.name AS org_name,
log.connected AS log_connected,
log.login AS log_login
FROM members mem
LEFT OUTER JOIN organizations org ON org.id = mem.organization
LEFT OUTER JOIN logs log ON log.login = mem.login
SQL;



$initrequest["projects"] = <<<SQL
SELECT 
pro.id AS pro_id, 
pro.organization AS pro_organization, 
pro.owner AS pro_owner, 
pro.priority AS pro_priority, 
pro.status AS pro_status, 
pro.name AS pro_name, 
pro.description AS pro_description, 
pro.url_dev AS pro_url_dev, 
pro.url_prod AS pro_url_prod, 
pro.created AS pro_created, 
pro.modified AS pro_modified, 
pro.published AS pro_published, 
pro.upload_max AS pro_upload_max, 
pro.phase_set AS pro_phase_set, 
pro.invoicing AS pro_invoicing, 
pro.hourly_rate AS pro_hourly_rate, 
org.id AS pro_org_id, 
org.name AS pro_org_name, 
mem.id AS pro_mem_id, 
mem.login AS pro_mem_login, 
mem.name AS pro_mem_name, 
mem.email_work AS pro_mem_email_work
FROM projects pro
LEFT OUTER JOIN organizations org ON org.id = pro.organization
LEFT OUTER JOIN members mem ON mem.id = pro.owner
SQL;

$initrequest["files"] = "SELECT fil.*, mem.id, mem.login, mem.name, mem.email_work, mem2.id, mem2.login, mem2.name, mem2.email_work
FROM " . $tableCollab["files"] . " fil
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = fil.owner
LEFT OUTER JOIN " . $tableCollab["members"] . " mem2 ON mem2.id = fil.approver
";

$initrequest["organizations"] = "SELECT org.*,mem.id,mem.login,mem.name,mem.email_work
FROM " . $tableCollab["organizations"] . " org
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = org.owner
";

$initrequest["topics"] = "SELECT topic.id, topic.project, topic.owner, topic.subject, topic.status, topic.last_post, topic.posts, topic.published, mem.id, mem.login, mem.name, mem.email_work, pro.id, pro.name
FROM " . $tableCollab["topics"] . " topic
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = topic.owner
LEFT OUTER JOIN " . $tableCollab["projects"] . " pro ON pro.id = topic.project
";

$initrequest["posts"] = "SELECT pos.id, pos.topic, pos.member, pos.created, pos.message, mem.id, mem.login, mem.name, mem.email_work
FROM " . $tableCollab["posts"] . " pos
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = pos.member
LEFT OUTER JOIN " . $tableCollab["topics"] . " topic ON topic.id = pos.topic
";

$initrequest["assignments"] = "SELECT ass.id, ass.task, ass.owner, ass.assigned_to, ass.comments, ass.assigned, mem1.id, mem1.login, mem1.name, mem1.email_work, mem2.id, mem2.login, mem2.name, mem2.email_work
FROM " . $tableCollab["assignments"] . " ass
LEFT OUTER JOIN " . $tableCollab["members"] . " mem1 ON mem1.id = ass.owner
LEFT OUTER JOIN " . $tableCollab["members"] . " mem2 ON mem2.id = ass.assigned_to
";

$initrequest["reports"] = "SELECT *
FROM " . $tableCollab["reports"] . " rep
";

$initrequest["teams"] = "SELECT tea.id, tea.project, tea.member, tea.published, tea.authorized, mem.id, mem.login, mem.name, mem.email_work, mem.title, mem.phone_work, org.name, pro.id, pro.name, pro.priority, pro.status, pro.published, org2.name, mem2.login, mem2.email_work, org2.id, log.connected, mem.profil, mem.password
FROM " . $tableCollab["teams"] . " tea
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = tea.member
LEFT OUTER JOIN " . $tableCollab["projects"] . " pro ON pro.id = tea.project
LEFT OUTER JOIN " . $tableCollab["organizations"] . " org ON org.id = mem.organization
LEFT OUTER JOIN " . $tableCollab["organizations"] . " org2 ON org2.id = pro.organization
LEFT OUTER JOIN " . $tableCollab["members"] . " mem2 ON mem2.id = pro.owner
LEFT OUTER JOIN " . $tableCollab["logs"] . " log ON log.login = mem.login
";

$initrequest["tasks"] = "SELECT tas.*, mem.id, mem.name, mem.login, mem.email_work, mem2.id, mem2.name, mem2.login, mem2.email_work, mem.organization, pro.name, org.id
FROM " . $tableCollab["tasks"] . " tas
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = tas.assigned_to
LEFT OUTER JOIN " . $tableCollab["projects"] . " pro ON pro.id = tas.project
LEFT OUTER JOIN " . $tableCollab["members"] . " mem2 ON mem2.id = tas.owner
LEFT OUTER JOIN " . $tableCollab["organizations"] . " org ON org.id = pro.organization
";

$initrequest["subtasks"] = "SELECT subtas.*, mem.id, mem.name, mem.login, mem.email_work, mem2.id, mem2.name, mem2.login, mem2.email_work, mem.organization, tas.name
FROM " . $tableCollab["subtasks"] . " subtas
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = subtas.assigned_to
LEFT OUTER JOIN " . $tableCollab["tasks"] . " tas ON tas.id = subtas.task
LEFT OUTER JOIN " . $tableCollab["members"] . " mem2 ON mem2.id = subtas.owner
";

$initrequest["phases"] = "SELECT pha.id, pha.project_id, pha.order_num, pha.status, pha.name, pha.date_start, pha.date_end, pha.comments
FROM " . $tableCollab["phases"] . " pha
";

$initrequest["updates"] = "SELECT upd.*, mem.id, mem.name, mem.login, mem.email_work
FROM " . $tableCollab["updates"] . " upd
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = upd.member
";

$initrequest["support_requests"] = "SELECT sr.id, sr.status, sr.member, sr.priority, sr.subject, sr.message, sr.owner, sr.date_open, sr.date_close, sr.project, pro.name, mem.name, mem.email_work
FROM " . $tableCollab["support_requests"] . " sr
LEFT OUTER JOIN " . $tableCollab["projects"] . " pro ON pro.id = sr.project
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = sr.member
";

$initrequest["support_posts"] = "SELECT sp.id, sp.request_id, sp.message, sp.date, sp.owner, sp.project, mem.name, mem.email_work
FROM " . $tableCollab["support_posts"] . " sp
LEFT OUTER JOIN " . $tableCollab["members"] . " mem ON mem.id = sp.owner
";

$initrequest["bookmarks"] = <<<SQL
SELECT
  boo.id AS boo_id,
  boo.owner AS boo_owner,
  boo.category AS boo_category,
  boo.name AS boo_name,
  boo.url AS boo_url,
  boo.description AS boo_description,
  boo.shared AS boo_shared,
  boo.home AS boo_home,
  boo.comments AS boo_comments,
  boo.users AS boo_users,
  boo.created AS boo_created,
  boo.modified AS boo_modified,
  mem.id AS boo_mem_id,
  mem.login AS boo_mem_login, 
  mem.email_work AS boo_mem_email_work, 
  boocat.name AS boo_boocat_name
FROM bookmarks boo
LEFT OUTER JOIN bookmarks_categories boocat ON boocat.id = boo.category
LEFT OUTER JOIN members mem ON mem.id = boo.owner
SQL;

$initrequest["bookmarks_categories"] = <<<SQL
SELECT
boocat.id AS boocat_id, 
boocat.name AS boocat_name, 
boocat.description AS boocat_description 
FROM bookmarks_categories boocat
SQL;

$initrequest["newsdeskposts"] = "SELECT news.* FROM " . $tableCollab["newsdeskposts"] . " news ";

$initrequest["newsdeskcomments"] = "SELECT newscom.* FROM " . $tableCollab["newsdeskcomments"] . " newscom ";

?>