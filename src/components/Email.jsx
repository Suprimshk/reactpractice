import React, { useState } from 'react'
import { useEffect } from 'react';
function Email()
{
    const[email,setEmail]=useState([]);


    const getEmail=async()=>{
    const response=await fetch('http://127.0.0.1:8000/api/getEmail');
   
    setEmail(await response.json());
    }

    useEffect(()=>
    {
        getEmail();
    },[]);

    return(
        <main id="main">
        <section id="services" className="services section-bg">
        <div className="container" data-aos="fade-up ">
  
         
  
          <div className="row">
     
                
                  {     email.map((element)=>(
                       <>
                       <div className="col-xl-3 col-md-6 d-flex align-items-stretch" 
                       key={element.id} data-aos="zoom-in" data-aos-delay="100">
                      <div className="icon-box">
                        
                        <h4>
                          <a href="">{element.name}</a>  <p>hah</p>
                          </h4>
                        <p>{element.message}</p>
                        </div>
                        </div>  

                  </>
                  )
                   
              
            )}
            
            
  
            
  
           
  
          </div>
  
        </div>
      </section>
      </main>

    )
}
export default Email
