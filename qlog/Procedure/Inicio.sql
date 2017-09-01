/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
/**
 * Author:  cristian
 * Created: 31/08/2017
 */

BEGIN
set @queue_id = '';
#set @desde = "2017-07-31 9:00";
#set @hasta = "2017-07-31 18:00";

set @desde = desde;
set @hasta = hasta;

#Obtengo ID de COLA
SELECT u.queue_id INTO @queue_id FROM qname as u WHERE u.queue = cola;

#RECIBIDAS
select count(*) INTO @RECIBIDAS FROM queue_stats as u where u.datetime > @desde and u.datetime < @hasta and u.qname = @queue_id and qevent = 15 ;

#ATENDIDAS
select count(*) INTO @ATENDIDAS FROM queue_stats as u where u.datetime > @desde and u.datetime < @hasta and u.qname = @queue_id and qevent = 12;

#ABANDONADAS
select count(*) INTO @ABANDONADAS FROM queue_stats as u where u.datetime > @desde and u.datetime < @hasta and u.qname = @queue_id and qevent = 1;

#ABANDONADAS_SL
select sum(if(TIMESTAMPDIFF(SECOND,t.f1,t.f2) > @SL,1,0))  as AB INTO @ABANDONADAS_SL from
(select (select u2.datetime FROM queue_stats as u2 where u.uniqueid = u2.uniqueid and qevent = 15) as f1, 
u.datetime as f2 
FROM queue_stats as u 
where u.datetime > @desde and u.datetime < @hasta and u.qname = 33 and qevent = 1) t;

#OFRECIDAS NO ATENDIDAS
select count(*) INTO @OFRECIDAS_NO_ATENDIDAS FROM queue_stats as u where u.datetime > @desde and u.datetime < @hasta and u.qname = @queue_id and qevent = 25;




#TIEMPO_DE_ESPERA (ATENDIDAS)
select sum(TIMESTAMPDIFF(SECOND,t.f1,t.f2)) as AB INTO @TIEMPO_DE_ESPERA from
(select (select u2.datetime FROM queue_stats as u2 where u.uniqueid = u2.uniqueid and qevent = 15 and u.qname = u2.qname) as f1, 
u.datetime as f2 
FROM queue_stats as u 
where u.datetime > @desde and u.datetime < @hasta and u.qname = 33 and qevent = 12) t;

#AVG_TIEMPO_DE_ESPERA
SET @AVG_TIEMPO_DE_ESPERA = @TIEMPO_DE_ESPERA / @ATENDIDAS;



#TIEMPO_DE_CONVERSACION (ATENDIDAS)
select sum(TIMESTAMPDIFF(SECOND,t.f1,t.f2)) as AB INTO @TIEMPO_DE_CONVERSACION from
(select (select u2.datetime FROM queue_stats as u2 where u.uniqueid = u2.uniqueid and qevent = 12 and u.qname = u2.qname) as f1, 
u.datetime as f2 
FROM queue_stats as u 
where u.datetime > @desde and u.datetime < @hasta and u.qname = 33 and (qevent = 9 or qevent = 10)) t;

#AVG_TIEMPO_DE_CONVERSACION
SET @AVG_TIEMPO_DE_CONVERSACION = @TIEMPO_DE_CONVERSACION / @ATENDIDAS;

#ATENCION
SET @ATENCION = @ATENDIDAS * 100 / @RECIBIDAS;

#ATENDIDAS_SERVICE_LEVEL
select SUM(if(TIMESTAMPDIFF(SECOND,t.f1,t.f2)<sl,1,0)) as SL INTO @ATENDIDAS_SERVICE_LEVEL  from
(select (select u2.datetime FROM queue_stats as u2 where u.uniqueid = u2.uniqueid and qevent = 15 and u.qname = u2.qname) as f1, 
u.datetime as f2 
FROM queue_stats as u 
where u.datetime > @desde and u.datetime < @hasta and u.qname = 33 and qevent = 12) t;



select @queue_id,@RECIBIDAS,@ATENDIDAS,@ABANDONADAS,@ATENCION,@ATENDIDAS_SERVICE_LEVEL,@TIEMPO_DE_CONVERSACION,@AVG_TIEMPO_DE_CONVERSACION, @TIEMPO_DE_ESPERA,@AVG_TIEMPO_DE_ESPERA,@ABANDONADAS_SL,@OFRECIDAS_NO_ATENDIDAS;
END