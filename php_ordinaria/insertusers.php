<?php
$connection = new mysqli('localhost', "root", "", 'consultas');
if ($connection->connect_error) die("Fatal Error");

$query="INSERT INTO tu_tabla (dniUsu, usuLogin, usuPassword, usutipo, usuEstado) VALUES
-- Administradores
('111111111', 'admin1', '".password_hash("admin1", PASSWORD_DEFAULT)."', 'Administrador', 'Activo'),
('222222222', 'admin2', '".password_hash("admin2", PASSWORD_DEFAULT)."', 'Administrador', 'Activo'),

-- Médicos
('333333333', 'medico1', '".password_hash("medico1", PASSWORD_DEFAULT)."', 'Medico', 'Activo'),
('444444444', 'medico2', '".password_hash("medico2", PASSWORD_DEFAULT)."', 'Medico', 'Activo'),
('555555555', 'medico3', '".password_hash("medico3", PASSWORD_DEFAULT)."', 'Medico', 'Activo'),
('666666666', 'medico4', '".password_hash("medico4", PASSWORD_DEFAULT)."', 'Medico', 'Activo'),
('777777777', 'medico5', '".password_hash("medico5", PASSWORD_DEFAULT)."', 'Medico', 'Activo'),
('888888888', 'medico6', '".password_hash("medico6", PASSWORD_DEFAULT)."', 'Medico', 'Activo'),
('999999999', 'medico7', '".password_hash("medico7", PASSWORD_DEFAULT)."', 'Medico', 'Activo'),
('101010101', 'medico8', '".password_hash("medico8", PASSWORD_DEFAULT)."', 'Medico', 'Activo'),

-- Asistentes
('121212121', 'asistente1', '".password_hash("asistente1", PASSWORD_DEFAULT)."', 'Asistente', 'Activo'),
('131313131', 'asistente2', '".password_hash("asistente2", PASSWORD_DEFAULT)."', 'Asistente', 'Activo'),

-- Pacientes
('141414141', 'paciente1', '".password_hash("paciente1", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('151515151', 'paciente2', '".password_hash("paciente2", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('161616161', 'paciente3', '".password_hash("paciente3", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('171717171', 'paciente4', '".password_hash("paciente4", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('181818181', 'paciente5', '".password_hash("paciente5", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('191919191', 'paciente6', '".password_hash("paciente6", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('202020202', 'paciente7', '".password_hash("paciente7", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('212121212', 'paciente8', '".password_hash("paciente8", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('222222222', 'paciente9', '".password_hash("paciente9", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('232323232', 'paciente10', '".password_hash("paciente10", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('242424242', 'paciente11', '".password_hash("paciente11", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('252525252', 'paciente12', '".password_hash("paciente12", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('262626262', 'paciente13', '".password_hash("paciente13", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('272727272', 'paciente14', '".password_hash("paciente14", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('282828282', 'paciente15', '".password_hash("paciente15", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('292929292', 'paciente16', '".password_hash("paciente16", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('303030303', 'paciente17', '".password_hash("paciente17", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('313131313', 'paciente18', '".password_hash("paciente18", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('323232323', 'paciente19', '".password_hash("paciente19", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('333333333', 'paciente20', '".password_hash("paciente20", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('343434343', 'paciente21', '".password_hash("paciente21", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('353535353', 'paciente22', '".password_hash("paciente22", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('363636363', 'paciente23', '".password_hash("paciente23", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('373737373', 'paciente24', '".password_hash("paciente24", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('383838383', 'paciente25', '".password_hash("paciente25", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('393939393', 'paciente26', '".password_hash("paciente26", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('404040404', 'paciente27', '".password_hash("paciente27", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('414141414', 'paciente28', '".password_hash("paciente28", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('424242424', 'paciente29', '".password_hash("paciente29", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('434343434', 'paciente30', '".password_hash("paciente30", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('444444444', 'paciente31', '".password_hash("paciente31", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('454545454', 'paciente32', '".password_hash("paciente32", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('464646464', 'paciente33', '".password_hash("paciente33", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('474747474', 'paciente34', '".password_hash("paciente34", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('484848484', 'paciente35', '".password_hash("paciente35", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('494949494', 'paciente36', '".password_hash("paciente36", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('505050505', 'paciente37', '".password_hash("paciente37", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('515151515', 'paciente38', '".password_hash("paciente38", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('525252525', 'paciente39', '".password_hash("paciente39", PASSWORD_DEFAULT)."', 'Paciente', 'Activo'),
('535353535', 'paciente40', '".password_hash("paciente40", PASSWORD_DEFAULT)."', 'Paciente', 'Activo')";


$result= $connection->query($query);
if (!$result) die("Fatal Error");