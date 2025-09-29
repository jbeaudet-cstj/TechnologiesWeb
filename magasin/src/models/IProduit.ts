// import type lorsqu'on importe un type
import type { IAvis } from "@/models/IAvis.ts"

export interface IProduit {
   id: number
   nom: string
   description: string
   prix: number
   inventaire: number
   avis: IAvis[]
}
