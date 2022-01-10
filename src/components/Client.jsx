import React, { useState } from 'react'
import { Button } from 'react-bootstrap';
import { Form} from 'react-bootstrap';
function Client()
{
    
   const[image,setImage]=useState("");
  
   async function onSubmit(event){
  
     const formData= new FormData();
    
     formData.append('image',image);
     let result=await fetch("http://127.0.0.1:8000/api/addClient",
     {
        
         body:formData
     }
     );
 
    
   }
    return(

<>
    <Form onSubmit={onSubmit}>
    
    <Form.Group>
      <Form.File  label="choose logo"
      onChange={
        (e)=>setImage(e.target.files[0])
      } />
    </Form.Group>
    
    
  
  <Button type="submit"
   className="btn btn-primary"
   
   >Submit</Button>
</Form>
         

  
</>

    );
}
export default Client