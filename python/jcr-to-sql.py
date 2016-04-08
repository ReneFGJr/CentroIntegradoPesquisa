print("Phython")
print("Convertendo ...")
ref = open('d:/lixo/jcr.txt', 'r')
res = open('issn-jcr.sql', 'w')
nr = 0;
ar = 100;
for linha in ref:
        
    v = linha.split()
    nr = nr + 1    
    
    issn = v[0][0:9]
    if (len(issn) == 9):
    	res.write('insert into issn_l_jcr (il_issn,il_issn_l) values ')
    	res.write('("' + issn + '","' + issn + '")')
    	print(issn,issn)
    res.write(';' + chr(13))
  
res.write('') 
ref.close()
print("Finalizado")
