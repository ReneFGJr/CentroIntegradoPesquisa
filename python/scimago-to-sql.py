print("Phython")
print("Convertendo ...")
ref = open('d:/lixo/scimagojr.csv', 'r')
res = open('issn-scimago.sql', 'w')
nr = 0;
ar = 100;
for linha in ref:
        
    v = linha.split()
    nr = nr + 1    
    if (ar == 100):
        res.write('insert into issn_l_scimago (il_issn,il_issn_l) values ')
    if (ar != 100):
        res.write(', ')            
    issn = v[1][:4] + '-' + v[1][4:]
    res.write('("' + issn + '","' + issn + '")')
    print(issn,v[1])
    ar = ar - 1
    if (ar < 0):
        res.write(';' + chr(13) + chr(10))
        ar = 100                    
  
res.write('') 
ref.close()
print("Finalizado")
