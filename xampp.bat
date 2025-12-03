@echo off
set DOWNLOAD_URL=https://www.apachefriends.org/xampp-files/8.2.4/xampp-windows-x64-8.2.4-0-VS16-installer.exe
set INSTALLER=xampp-installer.exe
set XAMPP_DIR=C:\xampp

echo Verificando si XAMPP ya está instalado...

if exist "%XAMPP_DIR%" (
    echo.
    echo ================================
    echo  XAMPP ya está instalado.
    echo  No es necesario reinstalarlo.
    echo ================================
    echo.
    pause
    exit /b
)

echo XAMPP no encontrado. Procediendo con la instalación...

echo Descargando instalador de XAMPP...
powershell -Command "(New-Object Net.WebClient).DownloadFile('%DOWNLOAD_URL%', '%INSTALLER%')"

echo Instalando XAMPP silenciosamente...
%INSTALLER% --mode unattended --launchapps 0

echo Instalación completada.
pause
