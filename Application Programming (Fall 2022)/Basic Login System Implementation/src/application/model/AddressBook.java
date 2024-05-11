/**
 * AddressBook is a Java class containing a model information for program.
 * 
 * @author Jeremiah Garcia (lnm248)
 * UTSA CS 3443 - Lab 5
 * Fall 2022
 */

package application.model;

import java.util.ArrayList;
import java.io.File;
import java.io.IOException;
import java.util.Scanner;

import javafx.collections.FXCollections;
import javafx.collections.ObservableList;

public class AddressBook {
	
	private String bookName;
	ArrayList<Contact> contacts = new ArrayList<Contact>();
	
	/* Constructor for this class */
	public AddressBook(String name) {
		this.bookName = name;
	}
	
	/* Setters & getters for this variable */
	public void setBookName(String bookName) {
		this.bookName = bookName;
	}
	public String getBookName() {
		return bookName;
	}
	
	/* Setters & getters for this variable */
	public void setContacts(ArrayList<Contact> contacts) {
		this.contacts = new ArrayList<>();
	}
	public ArrayList<Contact> getContacts() {
		return contacts;
	}
	
	/* Method toString, which will be responsible for returning the correct lab output */
	@Override
	public String toString() {
		String output = "";
//		output += String.format("\n-----------\n");
		for(int i = 0;i < contacts.size(); i++) {
			output += String.format("%s\n", contacts.get(i).toString());
		}
		return output;
	}
	
	/* Method to add a contact */
	public Contact addContact(Contact e) {
		contacts.add(e);
		return e;
	}
	
	/* Takes a file name along with a username and adds each contact in the file to that address book */ 
	public ObservableList<Contact> loadContacts(String file, String fullname) {
		ObservableList<Contact> contacts = null;
		try {
			File inputFile = new File(file);
			
			//Checks if inputFile exists, if not, return (for users with no family file)
			if(inputFile.isFile() == false) {
				return contacts;
			}
			
			contacts = FXCollections.observableArrayList();
			Scanner scnr = new Scanner(inputFile);
			
			while (scnr.hasNext()) {
				String line = scnr.nextLine();
				String[] items = line.split(",");
				if(items.length == 4) {
					//This is a family member
					Contact c = addContact(new FamilyMember(items[0], items[2], items[1], items[3]));
					contacts.add(c);
//					System.out.println("Added contact: " + c);
				}
				else if(items.length == 3) {
					//This is a work contact
					
					//Doesn't add user information to work contact table view
					if(fullname.equals(items[0])) {
						continue;
					}
					Contact c = addContact(new WorkContact(items[0], items[2], items[1]));
					contacts.add(c);
//					System.out.println("Added contact: " + c);
				}
				else {
					System.out.println("ERROR: No conditional fulfilled for loadContacts (Neither format of work or family contact was used)");
				}
				
			}
			scnr.close();
		} catch (IOException e) {
			e.printStackTrace();
		}
		return contacts;
	}
}