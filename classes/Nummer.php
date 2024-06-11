<?php

declare(strict_types=1);
class Nummer
{
private ?int $ID;

private ?string $AlbumID;

private ?string $Titel;

private ?string $Duur;

private ?string $URL;

    /**
     * @param int|null $ID
     * @param string|null $AlbumID
     * @param string|null $Titel
     * @param string|null $Duur
     * @param string|null $URL
     */
    public function __construct(?int $ID, ?string $AlbumID, ?string $Titel, ?string $Duur, ?string $URL)
    {
        $this->ID = $ID;
        $this->AlbumID = $AlbumID;
        $this->Titel = $Titel;
        $this->Duur = $Duur;
        $this->URL = $URL;
    }


    public static function getAll(PDO $db): array
{
    // Voorbereiden van de query
    $stmt = $db->query("SELECT * FROM Nummer");

    // Array om personen op te slaan
    $Nummers = [];

    // Itereren over de resultaten en personen toevoegen aan de array
    while ($row = $stmt->fetch(PDO::FETCH_ASSOC)) {
        $Nummer = new Nummer(
            $row['ID'],
            $row['AlbumID'],
            $row['Titel'],
            $row['Duur'],
            $row['URL'],
        );
        $Nummers[] = $Nummer;
    }


    return $Nummers ;
}

    /**
     * @return int|null
     */
    public function getID(): ?int
    {
        return $this->ID;
    }

    /**
     * @param int|null $ID
     */
    public function setID(?int $ID): void
    {
        $this->ID = $ID;
    }

    /**
     * @return string|null
     */
    public function getAlbumID(): ?string
    {
        return $this->AlbumID;
    }

    /**
     * @param string|null $AlbumID
     */
    public function setAlbumID(?string $AlbumID): void
    {
        $this->AlbumID = $AlbumID;
    }

    /**
     * @return string
     */
    public function getTitel(): string
    {
        return $this->Titel;
    }

    /**
     * @param string $Titel
     */
    public function setTitel(string $Titel): void
    {
        $this->Titel = $Titel;
    }

    /**
     * @return string
     */
    public function getDuur(): string
    {
        return $this->Duur;
    }

    /**
     * @param string $Duur
     */
    public function setDuur(string $Duur): void
    {
        $this->Duur = $Duur;
    }

    /**
     * @return string
     */
    public function getURL(): string
    {
        return $this->URL;
    }

    /**
     * @param string $URL
     */
    public function setURL(string $URL): void
    {
        $this->URL = $URL;
    }


}
