import React, { useEffect, useRef, useState } from "react";
import { Dialog } from "primereact/dialog";
import { Button } from "primereact/button";
import { InputTextarea } from "primereact/inputtextarea";
import { InputNumber } from "primereact/inputnumber";
import { fetchCategories } from "@/api/apiCategories";
import { Dropdown, DropdownChangeEvent } from "primereact/dropdown";
import { addProduits, fetchProduits } from "@/api/apiProduits";
import axios from "axios";
import { Toast } from "primereact/toast";



interface ProduitTableProps {
    closeDialog: () => void; 
    visible:boolean;
    setProduits: (data:any) => void;
}

const AddProduitDialog : React.FC<ProduitTableProps> = ({ visible, closeDialog, setProduits }) => {
  const [produit, setProduct] = useState({ nom: "", description: "", prix: 0.00, idCategorie: 0 });
  const [categories, setCategories] = useState<{ nom: string; id: number}[]>([]); 
  const [loading, setLoading] = useState(true);
  const [error, setError] = useState<string | null>(null);
  const toast = useRef<Toast>(null);

  useEffect(() => {
    
    const loadCategories = async () => {
      try {
        var data = await fetchCategories(); 
        data = [{
            id: "null", 
            nom: "Aucune catégorie",
          }].concat(data);
        const options = [
            ...data.map((cat: { nom: string; id: number }) => ({
                label: cat.nom, 
                value: cat.id,  
            })),
          ];
        setCategories(options); 
        setLoading(false);
      } catch (err) {
        console.error("Erreur lors du chargement des catégories :", err);
        setError("Impossible de charger les catégories.");
        setLoading(false);
      }
    };
    loadCategories();
  }, []);

  const handleAddProduct = async () => { 
    
    if(produit.nom == "") {
        const messageError = document.getElementById("errorMessage");
        if (messageError) {
            messageError.textContent = "Erreur : Le nom du produit est requis";
            messageError.classList.add("visible"); 
        }
    }else if(produit.description == "") {
        const messageError = document.getElementById("errorMessage");
        if (messageError) {
            messageError.textContent = "Erreur : La description du produit est requise";
            messageError.classList.add("visible"); 
        }
    }else if(produit.description.length>255) {
        const messageError = document.getElementById("errorMessage");
        if (messageError) {
            messageError.textContent = "Erreur : La description ne doit pas dépasser 255 caractères";
            messageError.classList.add("visible"); 
        }
    } else if(produit.nom.length>255) {
        const messageError = document.getElementById("errorMessage");
        if (messageError) {
            messageError.textContent = "Erreur : Le nom ne doit pas dépasser 255 caractères";
            messageError.classList.add("visible"); 
        }
    } else if(produit.prix<=0) {
        const messageError = document.getElementById("errorMessage");
        if (messageError) {
            messageError.textContent = "Erreur : Le prix ne peux pas être negatif ou nul";
            messageError.classList.add("visible"); 
        }
    }else {
        const messageError = document.getElementById("errorMessage");
        if (messageError) {
            messageError.textContent = "";
        }
        try {
            const response = await addProduits(produit);
            setProduct({
              nom: "",
              prix: 0.00,
              description:"",
              idCategorie: 0,
            });
            if(toast.current){
                toast.current?.show({
                    severity: "success",
                    summary: "Succès",
                    detail: "Produit ajouté avec succès !",
                  });
            }
            
            try {
                const data = await fetchProduits();
                setProduits(data); 
                setLoading(false);
              } catch (err) {
                setError("Impossible de récupérer les produits.");
                setLoading(false);
              }
              
          } catch (error : unknown) {
            const messageError = document.getElementById("errorMessage");
            if (axios.isAxiosError(error)) {
                if (error.response) {
                    if (messageError) {
                        messageError.classList.add("visible"); 
                        messageError.textContent = error.response.data.message;
                    }
                } else if (error.request) {
                  console.error("Erreur réseau :", error.request);
                  setError("Erreur réseau : Impossible de joindre le serveur.");
                } else {
                  console.error("Erreur inattendue :", error.message);
                  setError(`Erreur inattendue : ${error.message}`);
                }
              } else {
                console.error("Erreur non capturée :", error);
                setError("Erreur inconnue.");
              }
          }
        closeDialog();
    }
  };

  const handleCategoryChange = (e: { value: number }) => {
    setProduct({ ...produit, idCategorie: e.value }); 
  };

  return (<>
    <Toast ref={toast} />
    <Dialog header="Ajouter un produit" visible={visible}  style={{ width: "50vw" }} onHide={closeDialog}>
    <p style={{color:"red"}} id="errorMessage"></p>
      <div className="p-fluid">
        <div className="field">
          <label htmlFor="nom">Nom</label>
          <input id="nom" type="text"  value={produit.nom}  onChange={(e) => setProduct({ ...produit, nom: e.target.value })} className="p-inputtext p-component"  />
        </div>
        <div className="field">
          <label htmlFor="description">Description</label>
          <InputTextarea autoResize value={produit.description} onChange={(e) => setProduct({ ...produit, description: e.target.value })} rows={5} cols={30} />
        </div>
        <div className="field">
          <label htmlFor="prix">Prix</label>
          <InputNumber inputId="currency-germany" value={produit.prix} onChange={(e) => setProduct({ ...produit, prix: e.value ?? 0 })} mode="currency" currency="EUR" locale="fr-FR" />
        </div>
        <div className="field">
          <label htmlFor="Catégorie">Catégorie</label>
          <Dropdown
          id="categorie"
          value={produit.idCategorie}
          options={categories}
          onChange={handleCategoryChange}
          placeholder="Aucune catégorie"
        />
        </div>
      </div>
        <Button label="Annuler" className="p-button-text" onClick={closeDialog} />
        <Button label="Ajouter" className="p-button-primary" onClick={handleAddProduct} />
    </Dialog></>
  );
};

export default AddProduitDialog;
