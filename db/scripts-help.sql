select *
from avaliacao
where 
(email like 'lucas.castanhola%' or
emailaval like 'lucas.castanhola%')



select *
from avaliado
where
grupo = 8 and 
sigla_org like 'copes'



select count(*)
from avaliado
where
Situacao not like 'impedido') * 100 as conta


select email from avaliado 
where 
sigla_org like 
(select subordinacao from avaliado 
where email like 'pmlag@inpa.gov.br' 
and (sigla_org like '' or subordinacao like 'COPOG') )
and tipo like 'chefia%'



# list the employees that hava not finished the evaluation
select av.sigla_org, av.nome, av.email
from avaliado av 
where 
av.siape not in (
select cast(a.siape as unsigned)
from avaliacao a 
where a.opcao like 'auto%')
and av.Situacao not like 'impedido'
order by av.sigla_org, av.nome;

# num pendentes por coord
select av.sigla_org sigla, count(av.sigla_org) as ctotal
from avaliado av 
where 
av.siape not in (
select cast(a.siape as unsigned)
from avaliacao a 
where a.opcao like 'auto%')
and av.Situacao not like 'impedido'
group by sigla
order by ctotal desc;



#IDI - percentual de avaliados pela chefia
select 
(select count(*)
from avaliacao where opcao like 'chefia%imediata') /
(select count(*) from avaliado av
where av.Situacao not like 'impedido') as 'Chefia%'

#IDI - quem a chefia nao avaliaou
select av.sigla_org, av.nome from avaliado av
where av.Situacao not like 'impedido'
and av.email not in
(
select avao.email
from avaliacao avao 
where opcao like 'chefia%imediata'
) order by av.sigla_org, av.nome asc

#IDI - qtd quem a chefia nao avaliaou pro grupo
select av.sigla_org, count(av.sigla_org) as tcount from avaliado av
where av.Situacao not like 'impedido'
and av.email not in
(
select avao.email
from avaliacao avao 
where opcao like 'chefia%imediata'
) 
group by av.sigla_org
order by tcount desc




#verificar as avaliacoes ppelo nome
select * from avaliacao
where nome like '%waldemar%'
or nomeaval like '%waldemar%' 