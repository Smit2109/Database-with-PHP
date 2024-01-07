#Query 1 - Search order
  SELECT A.id_livrare, B.nume_sofer, A.ora_livrare, A.adresa_livrare, A.stare_livrare, A.contact_destinatar, A.contact_expeditor
  FROM livrare A
  JOIN livrator B ON A.id_livrator = B.id_livrator
  WHERE A.id_livrare = :id_comanda;

#Query 2 - Clients
  SELECT * FROM clienti

#Update - Clients
  UPDATE clienti SET numar_telefon = :phone, email = :email WHERE numele_clientului = :username

#Delete - Clients
  DELETE FROM Clienti Where numele_clientului = :username

#Insert - Clients
  INSERT INTO clienti (numele_clientului, numar_telefon, email) VALUES (:username, :phone, :email)

//TODO
#Update - Order
#Delete - Order
#Insert - Order

  #sa avem camp variabibl la selecturi
  #select-ul trebuie sa aiba minim join
  #rapoarte simple si complexe
  #complexe = subquery

