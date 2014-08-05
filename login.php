<?php

        include ('conexion.php');      // Archivo de conexion de la base de datos //
        include ('style.css');
          error_reporting(0);  
            
            
            echo "<center><img src = 'images/cielo.jpg' width = '200' height = '200'></center>";
            
            
            echo "
                <form action = 'login.php' method = 'post'>    
                    <label for = 'Username'>Usuario</label>
                    <input type = 'text' name = 'Username'>
                    <label for = 'Password'>Password</label>
                    <input type = 'text' name = 'Password'>
                    <center><input type = 'submit' name = 'submit' value = 'Ingresar' class ='submit'></center>
                </form>";
                  
                  
                if(isset($_REQUEST['Username'])){
            
                            // VARIABLES DE LA FORMA HTML//
                            
                    $user = $_REQUEST['Username'];
                    $pass = $_REQUEST['Password'];
                    
                    $id = mysql_query ("SELECT ID_Usuario, ID_Empleado FROM Usuario WHERE  Nombre = '$user' AND Password = '$pass'") or die (mysql_error());
                    
                        while ($row = mysql_fetch_array($id)){
                                
                                $id_user = $row['ID_Usuario'];
                                $id_empleado = $row['ID_Empleado'];
                               
                        }
                        
                        
                    
                  
                            $var_db = mysql_query("SELECT Nombre,Password FROM Usuario WHERE ID_Usuario = '$id_user'") or die (mysql_error());
                                
                                while($row=mysql_fetch_array($var_db)){
                                
                                     $user_db =$row['Nombre'];
                                     $pass_db =$row['Password'];
                                     
                                
                                }
                                                        // CONSULTA PARA SACAR EL RANGO //
                                
                                $rango = mysql_query("SELECT Empleado.ID_Rango, Empleado.ID_Empleado, Usuario.ID_Usuario, Usuario.ID_Empleado, Rango.ID_Rango, Rango.Tipo
                                                     FROM Rango, Usuario, Empleado
                                                     WHERE Empleado.ID_Empleado = Usuario.ID_Empleado
                                                     AND Usuario.ID_Usuario = '$id_user'
                                                     AND Rango.ID_Rango = Empleado.ID_Rango
                                                     " ) or die (mysql_error());
                                
                                
                                        while ($row = mysql_fetch_array($rango)){
                                                
                                                $rango = $row['Tipo'];
                                                
                                        }
                                
                                
                                if($user==$user_db AND $pass==$pass_db AND $rango=='Admin'){
                                        
                                        
                                        $turno = mysql_query("SELECT Turno.ID_Turno, Empleado.ID_Turno, Turno.Nombre
                                                             FROM Turno, Empleado
                                                             WHERE ID_Empleado = '$id_empleado'
                                                             AND Turno.ID_Turno = Empleado.ID_Turno")or die (mysql_error());
                                        
                                        
                                                while ($row=mysql_fetch_array($turno)){
                                                        
                                                        
                                                        $nom_turno=$row['Nombre'];
                                                }
                                                
                                                
                                        $nombre = mysql_query("SELECT Nombre FROM Empleado WHERE ID_Empleado = '$id_empleado'") or die (mysql_error());
                                        
                                                
                                                while($row=mysql_fetch_array($nombre)){
                                                        
                                                        
                                                        $nombre_e = $row['Nombre'];
                                                
                                                }
                                                
                                                
                                                        $_SESSION['id_user'] = $id_user;
                                                        $_SESSION['turno'] = $turno;
                                                        $_SESSION['nombre'] = $nombre_e;
                                                        
                                                        
                                                        echo"Hola Admin";
                                }
                                
                                
                                else {
                                        
                                        if($user==$user_db AND $pass==$pass_db AND $rango=='Empleado'){
                                                
                                                
                                                 $turno = mysql_query("SELECT Turno.ID_Turno, Empleado.ID_Turno, Turno.Nombre
                                                             FROM Turno, Empleado
                                                             WHERE ID_Empleado = '$id_empleado'
                                                             AND Turno.ID_Turno = Empleado.ID_Turno")or die (mysql_error());
                                        
                                        
                                                while ($row=mysql_fetch_array($turno)){
                                                        
                                                        
                                                        $nom_turno=$row['Turno'];
                                                }
                                                
                                                
                                        $nombre = mysql_query("SELECT Nombre FROM Empleado WHERE ID_Empleado = '$id_empleado'") or die (mysql_error());
                                        
                                                
                                                while($row=mysql_fetch_array($nombre)){
                                                        
                                                        
                                                        $nombre_e = $row['Nombre'];
                                                
                                                }
                                                
                                                
                                                        $_SESSION['id_user'] = $id_user;
                                                        $_SESSION['turno'] = $turno;
                                                        $_SESSION['nombre'] = $nombre_e;
                                                
                                                echo "Hola empleado";
                                                
                                                
                                        }
                                        
                                         else{
                                                
                                               echo "<script type = 'text/javascript'>
                                                        window.alert('Login Incorrecto');
                                                     </script>";   
                                                
                                        }             
                                           
                                   
                                        
                                }
                                            
                                        
                                }
                            
                        
                
                
                
                ?>