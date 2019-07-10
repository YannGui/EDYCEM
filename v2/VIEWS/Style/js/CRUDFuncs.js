function UserDelete(id, baseurl) 
{
	if(confirm('êtes-vous sûr de vouloir supprimer cet utilisateur ?'))
	{
		$.ajax({
	            url:baseurl + "user.php?action=Delete&userid=" + id, //the page containing php script
	            type: "GET",
	            success:function(result)
	            {
	            	var resultat = JSON.parse(result);
	            	if (resultat.success == false)
	            	{
		            	alert("Erreur lors de la suppression (action : " + resultat.action + ") : " + resultat.error);
		            	location.reload();
	            	}
	           }
	         });
		document.getElementById("ligneid" + id).remove();
	}
};


function BuildingDelete(id, baseurl) 
{
	if(confirm('êtes-vous sûr de vouloir supprimer ce batiment ?'))
	{
		$.ajax({
	            url:baseurl + "building.php?action=Delete&buildingid=" + id, //the page containing php script
	            type: "GET",
	            success:function(result)
	            {
	            	var resultat = JSON.parse(result);
	            	if (resultat.success == false)
	            	{
		            	alert("Erreur lors de la suppression du batiment (action : " + resultat.action + ") : " + resultat.error);
		            	location.reload();
	            	}
	           }
	         });
		document.getElementById("ligneid" + id).remove();
	}
};

function PlaceDelete(id, baseurl) 
{
	if(confirm('êtes-vous sûr de vouloir supprimer ce services ?'))
	{
		$.ajax({
	            url:baseurl + "place.php?action=Delete&placeid=" + id, //the page containing php script
	            type: "GET",
	            success:function(result)
	            {
	            	var resultat = JSON.parse(result);
	            	if (resultat.success == false)
	            	{
		            	alert("Erreur lors de la suppression du services (action : " + resultat.action + ") : " + resultat.error);
		            	location.reload();
	            	}
	           }
	         });
		document.getElementById("ligneid" + id).remove();
	}
};



function DishDelete(id, baseurl) 
{
	if(confirm('êtes-vous sûr de vouloir supprimer ce plat ?'))
	{
		$.ajax({
	            url:baseurl + "dish.php?action=Delete&platid=" + id, //the page containing php script
	            type: "GET",
	            success:function(result)
	            {
	            	var resultat = JSON.parse(result);
	            	if (resultat.success == false)
	            	{
		            	alert("Erreur lors de la suppression du services (action : " + resultat.action + ") : " + resultat.error);
		            	location.reload();
	            	}
	           }
	         });
		document.getElementById("ligneid" + id).remove();
	}
};


function TextureDelete(id, baseurl) 
{
	if(confirm('êtes-vous sûr de vouloir supprimer cette texture ?'))
	{
		$.ajax({
	            url:baseurl + "texture.php?action=Delete&textureid=" + id, //the page containing php script
	            type: "GET",
	            success:function(result)
	            {
	            	var resultat = JSON.parse(result);
	            	if (resultat.success == false)
	            	{
		            	alert("Erreur lors de la suppression du services (action : " + resultat.action + ") : " + resultat.error);
		            	location.reload();
	            	}
	           }
	         });
		document.getElementById("ligneid" + id).remove();
	}
};








