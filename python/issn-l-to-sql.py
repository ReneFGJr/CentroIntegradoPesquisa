print("Phython")
print("Convertendo ...")
ref = open('d:/lixo/ISSN-to-ISSN-L.txt', 'r')
res = open('issn-l.sql', 'w')
nr = 0;
ar = 100;
for linha in ref:
        
    v = linha.split()
    nr = nr + 1    
    if (ar == 100):
        res.write('insert into issn_l (il_issn,il_issn_l) values ')
    if (ar != 100):
        res.write(', ')            
    res.write('("' + v[0] + '","' + v[1] + '")')
    ar = ar - 1
    if (ar < 0):
        res.write(';' + chr(13))
        ar = 100
                    
  
res.write('') 
ref.close()
print("Finalizado")
