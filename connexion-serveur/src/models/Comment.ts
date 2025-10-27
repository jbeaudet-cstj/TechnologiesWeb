export interface IComment {
  id: number
  postId: number
  name: string
  email: string
  body: string
}


/* export interface INewComment {
  id?: number
  postId: number
  name: string
  email: string
  body: string
} */
 

// Pour ne pas créer le type manuellement
// le type Omit permet de rendre certains attributs optionnels
// 'id | name' si plusieurs attributs
export type INewComment = Omit<IComment, 'id'>


/* export interface IUpdatedComment {
  id?: number
  postId?: number
  name?: string
  email?: string
  body?: string
} */

// Le type Partial permet de rendre tous les attributs optionnels
export type IUpdatedComment = Partial<IComment>
