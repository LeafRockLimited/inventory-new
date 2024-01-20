class TableBody{
    constructor(
        total_data = 0,
        link = [],
        current_page = 1,
        total_per_page = 1
    ){
        this.total_data = total_data;
        this.link = link;
        this.current_page = current_page;
        this.total_per_page = total_per_page;
    }

    data(){
        return {
            total_data:this.total_data,
            link: this.link,
            current_page:this.current_page,
            total_per_page:this.total_per_page
        }
    }
    
    rowNum(index){
        return ((this.total_per_page * this.current_page) - this.total_per_page) + (index + 1)
    }

}

export default TableBody