-- Migration: Add support for up to 3 images per product
-- Run this SQL on your database before using the multiple images feature

ALTER TABLE productos ADD COLUMN imagen_url_2 VARCHAR(500) NULL AFTER imagen_url;
ALTER TABLE productos ADD COLUMN imagen_url_3 VARCHAR(500) NULL AFTER imagen_url_2;
