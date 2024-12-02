import axios from "axios";

const API_BASE_URL = "http://127.0.0.1:8000/api"; 

interface produits{
  nom:string;
  prix:number;
  description:string;
  idCategorie:number;
}

//GET
export const fetchProduits = async () => {
  try {
    const response = await axios.get(`${API_BASE_URL}/produits`);
    return response.data; 
  } catch (error) {
    console.error("Erreur lors de la récupération des produits :", error);
    throw error;
  }
};

//POST
export const addProduits = async (newProduits: produits) => {
  try {
    const response = await axios.post(`${API_BASE_URL}/produits`, newProduits);
    return response.data; 
  } catch (error) {
    console.error("Erreur lors de la récupération des produits :", error);
    throw error;
  }
};

//PUT
export const updateProduits = async ( id:number ,updatedProduit: produits) => {
  try {
    const response = await axios.put(`${API_BASE_URL}/produits/${id}`, updatedProduit);
    return response.data; 
  } catch (error) {
    console.error("Erreur lors de la récupération des produits :", error);
    throw error;
  }
};

//DELETE

export const deleteProduits = async ( id:number ) => {
  try {
    const response = await axios.delete(`${API_BASE_URL}/produits/${id}`);
    return response.data; 
  } catch (error) {
    console.error("Erreur lors de la récupération des produits :", error);
    throw error;
  }
};

