<?php
define("API_STRING_CNX", "?format=xml&view=deep&api-key=eonlinelatino");

define("WS_CTV", "http://ctv.cs.demo.comcastnets.net");
define("WS_PRD", "http://webservices.eonline.com");

//Galleries LogFile constants---------------
$LOG_INS_GALL_counter=0;
$LOG_EXI_GALL_counter=0;
$LOG_INS_IMA_counter=0;
$LOG_EXI_IMA_counter=0;
$LOG_INS_ALB_counter=0;
$LOG_EDI_ALB_counter=0;

$LOG_INS_GALL="Inserted Galleries:\n\n";
$LOG_EXI_GALL="Edited Galleries:\n\n";
$LOG_INS_IMA="Inserted Images:\n\n";
$LOG_EXI_IMA="Existing Images:\n\n";
$LOG_INS_ALB="Inserted Albums:\n\n";
$LOG_EDI_ALB="Edited Albums:\n\n";
//Galleries LogFile constants---------------

//Posts LogFile constants---------------
$LOG_INS_POST_counter=0;
$LOG_EXI_POST_counter=0;
$LOG_INS_IMA_counter=0;
$LOG_EXI_IMA_counter=0;
$LOG_INS_ALB_counter=0;
$LOG_EDI_ALB_counter=0;

$LOG_INS_POST="Inserted Posts:\n\n";
$LOG_EXI_POST="Edited Posts:\n\n";
$LOG_INS_IMA="Inserted Images:\n\n";
$LOG_EXI_IMA="Existing Images:\n\n";
$LOG_INS_ALB="Inserted Albums:\n\n";
$LOG_EDI_ALB="Edited Albums:\n\n";
//Posts LogFile constants---------------


$INS_GALL="INSERT INTO wp_ngg_gallery (gid, name, slug, path, title, galdesc, pageid, previewpic, author, gallery_modified_SAGE) VALUES";
$INS_PICT="INSERT INTO wp_ngg_pictures (pid, post_id, galleryid, filename, description, alttext, neworder) VALUES";
$INS_ALBU="INSERT INTO wp_ngg_album VALUES";
$EDI_GALL="UPDATE wp_ngg_gallery SET";
$INS_PICT_REPEATED="INSERT INTO pictures_galleries (pid, gid, neworder) VALUES";

define("PICTURES_GALLERIES_TABLE", "pictures_galleries");
define("GALLERY_TABLE", "wp_ngg_gallery");
define("GALLERY_ID_NAME", "gid");
define("PICTURES_TABLE", "wp_ngg_pictures");
define("PICTURES_ID_NAME", "pid");
define("ALBUM_TABLE", "wp_ngg_album");
define("ALBUM_ID_NAME", "id");
define("POSTS_TABLE", "wp_posts");
define("POST_ID_NAME", "ID");

$INS_POST="insert into wp_posts (ID, post_title, post_content, post_status, post_author, post_date, post_date_gmt, comment_status, ping_status, post_name, post_type, post_modified_SAGE)";
$INS_RELATIONSHIPS="insert into wp_term_relationships (object_id, term_taxonomy_id) VALUES";
$INS_TERMS="insert into wp_terms (name, slug) VALUES";
$INS_TAXONOMY="insert into wp_term_taxonomy (term_id, taxonomy) VALUES";
$EDI_POST="UPDATE wp_posts SET";

define("ERR_WR", "LogFile can not be written");
define("ERR_BQ", "Following query is wrong:");
?>
