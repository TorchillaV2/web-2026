program HelloCGI;

begin
  { Очень важно: сначала отправляем заголовок Content-Type }
  writeln('Content-Type: text/html; charset=utf-8');
  writeln; { Пустая строка — обязательна по стандарту CGI! }

  { Теперь само тело HTML }
  writeln('<html>');
  writeln('<head><title>Test CGI</title></head>');
  writeln('<body>');
  writeln('<h1>Привет из Pascal на macOS!</h1>');
  writeln('<p>Этот текст сгенерирован скомпилированной программой.</p>');
  writeln('</body>');
  writeln('</html>');
end.
