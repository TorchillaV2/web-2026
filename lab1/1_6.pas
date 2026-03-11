PROGRAM HttpResponse(INPUT, OUTPUT);

USES
  DOS;
   
VAR
  QueryString, Name: STRING;
  PosName, Ampersant: INTEGER; 

BEGIN
  QueryString := GetEnv('QUERY_STRING');
  PosName := Pos('name=', QueryString);
  Ampersant := Pos('&', QueryString);
  IF PosName = 1
  THEN 
    BEGIN                                  
      Name := Copy(QueryString, 6, Length(QueryString) - 5);
      IF Ampersant > 0 
      THEN
        Name := Copy(QueryString, 6, Ampersant - 6)
    END
  ELSE  
    Name := 'Anonymous';
       
  WRITELN('Content-Type: text/html');
  WRITELN;
                         
  WRITELN('<!DOCTYPE html>');
  WRITELN('<html>');
  WRITELN('<head>');
  WRITELN('<body>');
  WRITELN('<h3>Hello dear, ', Name, '!</h3>'); 
  WRITELN('</body>');
  WRITELN('</head>');
  WRITELN('</html>')
END.
