export type Niveau = "avertissement" | "erreur" | "info" | "succes"

export class Notification {
   readonly id: number
   readonly titre: string
   readonly message: string
   readonly niveau: Niveau
   timeoutId: number = 0
 
   constructor(titre: string, message: string, niveau: Niveau) {
     this.id = Notification._dernierId++
     this.titre = titre
     this.message = message
     this.niveau = niveau
   }
 
   private static _dernierId: number = 1
 }
