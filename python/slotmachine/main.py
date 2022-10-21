import random


MAX_LIJNEN = 3
MAXIMAAL_GOK_BEDRAG = 1000
MINIMALE_GOK_BEDRAG = 1


RWS = 3
CLS = 3

wiel_symbolen = {
    "A":1,
    "B":2,
    "C":4,
    "D":8,
}

wiel_waarde = {
    "A":10,
    "B":8,
    "C":4,
    "D":2,
}

def heeft_gewonnen (colommen, lijnen, wielwaarde, gok):
    winst=0
    for lijn in range(lijnen):
        print(colommen[0])[lijn]
        symbool = colommen[0][lijn]
        for colom in colommen:
            symbool_check = colom[lijn]
            if symbool != symbool_check:
                break
            else:
                winst += wielwaarde * gok
    return winst



    
def maak_wielen(rws, cls, wiel_symbolen):
    alle_symbolen = []
    for symbolen, symbolen_count in wiel_symbolen.items():
        for _ in range(symbolen_count):
            alle_symbolen.append(symbolen)
    
    colommen = []
    for _ in range(cls):
        colom = []
        huidige_symbolen = alle_symbolen[:]
        for _ in range(rws):
            waarde = random.choice(huidige_symbolen)
            huidige_symbolen.remove(waarde)
            colom.append(waarde)
        colommen.append(colom)
    
    return colommen

def print_de_wielen(colommen):
    for rij in range(len(colommen[0])):
        for i, colom in  enumerate(colommen):
            if i != len(colommen):
                print(colom[rij],  end=" | ")
            else:
                print(colom[rij],f"-{i+1}", end=" ")
        
        print()


def speelgeld():
    try:
        amount =int(input(f"Met hoeveel geld wil je spelen? (tussen {str(MINIMALE_GOK_BEDRAG)} & {str(MAXIMAAL_GOK_BEDRAG)}) "))
        if amount > 0:
            return amount
        else:
            print(f"Je ingave was: {amount} maar je waarde je moet groter zijn dan 0 ")

    except:
        print("Jou ingave is geen rond getal")

def speellijnen():
    try:
        amount = int(input(f"Op hoveel lijnen wil je spelen? ( 1 - {str(MAX_LIJNEN)})"))
        if  1<= amount <=3 :
            return amount
        else:
            print(f"{amount} moet een getal tussen de 1 en 3 zijn")


    except:
        print("geef een getal tussen de 1 en 3")

def gokbedrag(balans, lijnen):
    try:
        amount = int(input(f"Hoe hoog is je inzet per lijn? Dit kan een maximum zijn van {int(round(balans / lijnen, 0))}. "))
        while True:
            if 1<= amount <= round(balans / lijnen, 0) :
                totalbedrag_per_spin = amount * lijnen
                return amount, totalbedrag_per_spin
                break
            else:
                print(f"{amount} moet een positief getal zijn")


    except:
        print("geef een getal tussen de 1 en 3")




def spel_logica():
    balans = speelgeld()
    lijnen = speellijnen()

    gok, gok_totaal = gokbedrag(balans, lijnen)
    maak_slot = maak_wielen(RWS, CLS, wiel_symbolen)
    spin = print_de_wielen(maak_slot)
    winst = heeft_gewonnen(spin, lijnen, wiel_waarde, gok)

    print(spin)
    print(balans, lijnen, gok, gok_totaal, winst)



    

def main():
   spel_logica()

if __name__ == '__main__':
    main()
