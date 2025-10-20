export async function getData<T>(url: string): Promise<T> {
   const reponse = await fetch(url)

   // Contrairement à axios, fetch ne lance pas d'exception pour un status autre que 2xx
   if (!reponse.ok) { // ok = statut entre 200 et 299
      throw new Error(`Statut: ${reponse.status}`)
   }

   return await reponse.json()
}
