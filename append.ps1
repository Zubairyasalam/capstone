 = [IO.File]::ReadAllText('capstone/resources/views/welcome.blade.php')
 = [IO.File]::ReadAllText('media.txt')
 = .TrimEnd()
if (.EndsWith('</html>')) {  = .Substring(0, .Length - 7) }
if (.EndsWith('</body>')) {  = .Substring(0, .Length - 7) }
if (.EndsWith('</body>')) {  = .Substring(0, .Length - 7) }
 =  + " 

\ + + \

</body></html>\
[IO.File]::WriteAllText('capstone/resources/views/welcome.blade.php', )
