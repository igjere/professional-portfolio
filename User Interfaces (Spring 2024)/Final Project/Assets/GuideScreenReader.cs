using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.EventSystems;

public class GuideScreenReader : MonoBehaviour, IPointerEnterHandler, IPointerExitHandler
{
    public AudioSource SoundPlayer;

    public void OnPointerEnter(PointerEventData eventData)
    {
        if (MainScript.ScreenReaderEnabled == true)
            SoundPlayer.Play();
        Debug.Log("Mouse on GUIDE");
    }

    public void OnPointerExit(PointerEventData eventData)
    {
        Debug.Log("nah");
    }
}