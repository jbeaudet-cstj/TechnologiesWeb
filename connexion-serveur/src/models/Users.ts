// L'interface n'a pas a contenir tous les attributs de la réponse
// mais seulement ceux qui nous intéresse
export interface IAddress {
   customerAddress: string
   customerZipCode: string
   customerCountry: string
}

export interface IUserData {
   id: string
   name: string
   email: string
   image: string
   address: IAddress[]
}

export interface IUsers {
   data: IUserData[]
}

export interface IUser {
   data: IUserData
}
