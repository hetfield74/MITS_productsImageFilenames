
# MITS_productsImageFilenames (c) Copyright by Hetfield (MerZ IT-SerVice)

- Copyright & Author: Hetfield (https://www.merz-it-service.de)
- Für Version: modified eCommerce Shopsoftware ab der Version 2.x

<hr />

Klassenerweiterungsmodul für die modified eCommerce Shopsoftware ab der Version 2.x zur Manipulation von Artikelbildernamen (Bildernamen erhalten oder Artikelname verwenden usw.).

Je nach Einstellung wird der ursprüngliche Dateiname des Bildes nach dem Hochladen übernommen oder der Artikelname wird als Dateiname für das Bild gesetzt. Zur Maskierung des Dateinamens wird die shopinterne Funktion seo_url_href_mask benutzt.

Wird der ursprüngliche Dateiname behalten, kann auch eingestellt werden, ob die products_id und/oder die Bildnummer im Dateinamen vorhanden sein sollen.

Außerdem kann man das Modul die Kleinschreibung der Dateiendung (z.B. .JPG -> .jpg) erzwingen lassen.

<hr />

## Anleitung für das Klassenerweiterungsmodul MITS_productsImageFilenames für modified eCommerce Shopsoftware


### Installation

Systemvoraussetzung: Funktionsfähige modified eCommerce Shopsoftware ab der Version 2.x

Vor der Installation des Moduls sichern sie bitte komplett ihre aktuelle Shopinstallation (Dateien und Datenbank)!
Für eventuelle Schäden übernehmen wir keine Haftung!
Die Installation und Nutzung des Klassenerweiterungsmodul MITS_productsImageFilenames für modified eCommerce Shopsoftware erfolgt auf eigene Gefahr!

Die Installation des Klassenerweiterungsmodul MITS_productsImageFilenames für modified eCommerce Shopsoftware ist in der aktuellen Shopversion 2.x ziemlich einfach.

    1. Falls der admin-Order des Shops unbenannt wurde, dann entsprechnd auch den Ordner admin 
       im Verzeichns shoproot des Moduls vor dem Hochladen ebenfalls entsprechend umbenennen!

    2. Kopieren Sie einfach alle Dateien in dem Verzeichnis shoproot aus dem Modulpaket 
       MITS_productsImageFilenames in das Hauptverzeichnis ihrer bestehenden 
       modified eCommerce Shopsoftware 2.x Installation. Es werden dabei keine Dateien überschrieben!

    3. Nachdem sie alle Dateien in den Shop übertragen haben melden sie sich bitte im Shop mit einem 
       gültigen Adminzugang an, der die Berechtigung besitzt auch Klassenerweiterungsmodule zu installieren.

    4. Wechseln sie in den Administrationsbereich und rufen sie den Menüpunkt Module -> Klassenerweiterungen-Module auf.

    5. Im Reiter "categories" markieren sie bitte den Eintrag 
	   MITS Dateinamen für Artikelbilder © by Hetfield (MerZ IT-SerVice)
       und klicken sie dann auf der rechten Seite auf den Button Installieren. Das Modul wird nun komplett 
       installiert.

    6. Konfigurieren sie nun das Modul über den Button "Bearbeiten" nach ihren Wünschen. 
       Die verschiedenen Einstellmöglichkeiten sind im Modul erklärt.

    7. Fertig!

<hr />

### Was geschieht mit den bereits vorhandenen Bildern?

Dafür haben wir eine spezielle Erweiterung für dieses Modul erstellt. 
Diese vergibt allen bereits hochgeladenen Bildern mit Standard-Systemnamen (z.B. 12_0.jpg) einen neuen Dateinamen, basierend auf den Artikelnamen. 
Bilddateien, die bereits einen angepassten Namen besitzen, werden nicht umbenannt.
Diese Erweiterung kann kostenpflichtig bei uns per E-Mail angefragt werden.

<hr />

Benötigen sie Unterstützung bei der individuellen Anpassung des Moduls oder haben sie eventuell doch Probleme beim Einbau?
Gerne können sie unseren kostenpflichtigen Support in Anspruch nehmen.
Kontaktieren sie uns einfach unter <a href="https://www.merz-it-service.de/Kontakt.html">info(at)merz-it-service.de</a>

<hr />
<img src="https://www.merz-it-service.de/images/logo.png" alt="MerZ IT-SerVice" title="MerZ IT-SerVice" />

**MerZ IT-SerVice** Nicole Grewe - Am Berndebach 35a - D-57439 Attendorn
Telefon: 0 27 22 - 63 13 63 - Telefax: 0 27 22 - 63 14 00
E-Mail: <a href="https://www.merz-it-service.de/Kontakt.html">Info(at)MerZ-IT-SerVice.de</a> - Internet: <a href="https://www.merz-it-service.de">www.MerZ-IT-SerVice.de</a>

<hr />