INSERT INTO `user_role` (role) VALUES
  ('admin'),
  ('guest');

INSERT INTO `user` (firstName , lastName , email , encryptedPassword , role_id) VALUES
('super' , 'super' , 'admin@gmail.com' , '$2y$10$.k94cqlf1rbHvAWrDSKyp.D/vVp97CnXreK0XRctK.0ndE8OBV3M6',1);