export async function invokeMethod<TBody, TResponse>(url: string, method: string, body: TBody): Promise<TResponse> {
  const reponse = await fetch(url, {
    method: method,
    body: JSON.stringify(body),
    headers: {
      'Content-type': 'application/json; charset=UTF-8'
    }
  })

  // Contrairement à axios, fetch ne lance pas d'exception pour un status autre que 2xx
  if (!reponse.ok) { // ok = statut entre 200 et 299
    throw new Error(`Statut: ${reponse.status}`)
  }

  const data: TResponse = await reponse.json()
  return data
}


export async function getData<T>(url: string): Promise<T> {
   const reponse = await fetch(url)

   // Contrairement à axios, fetch ne lance pas d'exception pour un status autre que 2xx
   if (!reponse.ok) { // ok = statut entre 200 et 299
      throw new Error(`Statut: ${reponse.status}`)
   }

   return await reponse.json()
}
