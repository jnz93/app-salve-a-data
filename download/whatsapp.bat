@echo off
REG ADD "HKCR\whatsapp" /v "URL Protocol" /d "" /t REG_SZ
REG ADD "HKCR\whatsapp\shell\open\command" /ve /d "\"%LOCALAPPDATA%\WhatsApp\WhatsApp.exe\" \"%%1\"" /t REG_SZ
PAUSE