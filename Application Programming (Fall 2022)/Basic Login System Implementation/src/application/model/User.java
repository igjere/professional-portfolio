/**
 * User is a Java class containing a model information for program.
 * 
 * @author Jeremiah Garcia (lnm248)
 * UTSA CS 3443 - Lab 5
 * Fall 2022
 */

package application.model;

import java.io.File;
import java.io.IOException;
import java.util.Scanner;

public class User {
	
	private String fullName;
	private String username;
	private String password;
	private String favoriteColor1;
	private String favoriteColor2;
	private static int flag = 0;
	
	public User() {}
	
	public User(String item0, String item1, String item2, String item3, String item4) {
		this.fullName = item0;
		this.username = item1;
		this.password = item2;
		this.favoriteColor1 = item3;
		this.favoriteColor2 = item4;
	}
	
	public static User validate(String user, String pass) {
		User u = null;
		try {
			String file = "data/login.csv";
			File inputFile = new File(file);
			Scanner scnr = new Scanner(inputFile);
			String line;
			while(scnr.hasNext()) {
				line = scnr.nextLine();
				String[] items = line.split(",");
				//Sees if username and password information BOTH match for validation
				if( (user.equals(items[1])) && (pass.equals(items[2])) ) {
					u = new User(items[0], items[1], items[2],items[3], items[4]);
					flag = 1;
					break;
				}
			}
		} catch (IOException e) {
			e.printStackTrace();
		}
		
		if (flag==1) {
//			System.out.println("Entire while loop has traversed and a match has been found for the username and password entered");
			return u;
		}
		else {
//			System.out.println("Entire while loop has traversed and no match has been found for the username and password entered");
			return u;
			
		}	
	}
	
	/* Takes a user name and loads it for use */ 
	public static User loadUser(String username) {
		User u = null;
		try {
			String file = "data/login.csv";
			File inputFile = new File(file);
			Scanner scnr = new Scanner(inputFile);
			String line;
			while(scnr.hasNext()) {
				line = scnr.nextLine();
				String[] items = line.split(",");
				if( (username.equals(items[1])) ) {
					u = new User(items[0], items[1], items[2],items[3], items[4]);
					flag = 1;
					break;
				}
			}
		} catch (IOException e) {
			e.printStackTrace();
		}
		
		if (flag==1) {
			return u;
		}
		else {
//			System.out.println("ERROR: loadUser did NOT find a match (returning null User)");
			return u;	
		}
	}
	
	/* Setters & getters for this variable */
	public void setFullName(String fullName) {
		this.fullName = fullName;
	}
	public String getFullName() {
		return fullName;
	}
	
	/* Setters & getters for this variable */
	public void setUsername(String username) {
		this.username = username;
	}
	public String getUsername() {
		return username;
	}
	
	/* Setters & getters for this variable */
	public void setPassword(String password) {
		this.password = password;
	}
	public String getPassword() {
		return password;
	}
	
	/* Setters & getters for this variable */
	public void setFavoriteColor1(String favoriteColor1) {
		this.favoriteColor1 = favoriteColor1;
	}
	public String getFavoriteColor1() {
		return favoriteColor1;
	}
	
	/* Setters & getters for this variable */
	public void setFavoriteColor2(String favoriteColor2) {
		this.favoriteColor2 = favoriteColor2;
	}
	public String getFavoriteColor2() {
		return favoriteColor2;
	}
}
