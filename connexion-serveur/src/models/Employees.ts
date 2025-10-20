export interface IEmployee {
   id: number
   first_name: string
   last_name: string
   birth_date: string
   department: string
}

export interface IEmployees {
   total_pages: number
   employees: IEmployee[]
}
