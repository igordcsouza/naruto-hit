Option Explicit
On Error Resume Next

' Declarar as nossas variaveis
Dim objWinHttp, strURL

' Vai buscar o endereço para correr aos argumentos passados.
strURL = WScript.Arguments(0)

' Se desejarem podem colocar directamente o endereço a correr...
'strURL = "http://localhost/cron_otimize.php"

Set objWinHttp = CreateObject("WinHttp.WinHttpRequest.5")
objWinHttp.Open "GET", strURL
objWinHttp.Send

' Verifica se a resposta foi 200
' que é a esperada para um request de uma página bem sucedido
' http://www.asp101.com/resources/httpcodes.asp
If objWinHttp.Status <> 200 Then
	' Se não for 200 é porque foi mal sucedido... E poderá ser verificado
	Err.Raise 1, "HttpRequester", "Invalid HTTP Response Code"
End If