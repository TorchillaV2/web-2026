PROGRAM HttpResponse(INPUT, OUTPUT);

USES
  DOS;

VAR
  RequestMethod, QueryString, ContentLength, HttpUserAgent, HttpHost: STRING;

BEGIN
  RequestMethod := GetEnv('REQUEST_METHOD');
  QueryString := GetEnv('QUERY_STRING');
  ContentLength := GetEnv('CONTENT_LENGTH');
  HttpUserAgent := GetEnv('HTTP_USER_AGENT');
  HttpHost := GetEnv('HTTP_HOST');

  WRITELN('Content-Type: text/html');
  WRITELN;

  WRITELN('<!DOCTYPE html>');
  WRITELN('<html>');
  WRITELN('<head>');
  WRITELN('</head>');
  WRITELN('<body>');
  WRITELN('<h1> Sarah said: </h1>');
  IF QueryString = 'lanterns=1'
  THEN
    WRITELN('<p>The British are coming by land</p>')
  ELSE
    IF QueryString = 'lanterns=2'
    THEN
      WRITELN('<p>The British are coming by sea</p>')
      ELSE
        WRITELN('<p>Nothing</p>');
  WRITELN('<ol>');
  WRITELN('<li><strong> REQUEST_METHOD </strong>', RequestMethod, '</li>');
  WRITELN('<li><strong> QUERY_STRING </strong>', QueryString, '</li>');
  WRITELN('<li><strong> CONTENT_LENGTH </strong>', ContentLength, '</li>');
  WRITELN('<li><strong> HTTP_USER_AGENT </strong>', HttpUserAgent, '</li>');
  WRITELN('<li><strong> HTTP_HOST </strong>', HttpHost, '</li>');
  WRITELN('</ol>');
  WRITELN('</body>');
  WRITELN('</html>');
END.
