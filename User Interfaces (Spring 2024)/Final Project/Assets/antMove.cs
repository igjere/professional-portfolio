using System.Collections;
using System.Collections.Generic;
using UnityEngine;
using UnityEngine.UI;

public class antMove : MonoBehaviour
{
    public float moveForce = 1f;
    public float changeDirectionTime = 1f;
    public LevelManager levelMan;

    private Rigidbody2D rb;
    private Vector2 movement;
    private float directionTimer = 0f;

    public AudioSource SoundPlayer;
    bool MouseOn = false;

    public AudioSource KillSound;

    void Start()
    {
        rb = GetComponent<Rigidbody2D>();
        RandomizeMovement();
    }

    void Update()
    {
        directionTimer += Time.deltaTime;

        if (directionTimer >= changeDirectionTime)
        {
            directionTimer = 0f;
            RandomizeMovement();
        }

        RotateInMovementDirection();
        HandleBoundaries();
    }

    void FixedUpdate()
    {
        rb.velocity = movement * moveForce;
    }

    private void RandomizeMovement()
    {
        float angle = Random.Range(0, 360) * Mathf.Deg2Rad;
        movement = new Vector2(Mathf.Cos(angle), Mathf.Sin(angle));
    }

    private void RotateInMovementDirection()
    {
        if (movement != Vector2.zero)
        {
            float angle = Mathf.Atan2(movement.y, movement.x) * Mathf.Rad2Deg;
            angle += -90;
            transform.rotation = Quaternion.AngleAxis(angle, Vector3.forward);
        }
    }

    private void HandleBoundaries()
    {
        if (transform.position.x < -10 || transform.position.x > 10 || transform.position.y < -10 || transform.position.y > 10)
        {
            movement = -movement + Random.insideUnitCircle;
        }
    }
    private void OnMouseOver()
    {
        if (MouseOn == false)
        {
            if (MainScript.ScreenReaderEnabled == true)
                SoundPlayer.Play();
            MouseOn = true;
        }
        Debug.Log(MouseOn);
    }

    private void OnMouseExit()
    {
        MouseOn = false;
        Debug.Log(MouseOn);
    }
    private void OnMouseDown()
    {
        StartCoroutine(KillBug());
    }

    private IEnumerator KillBug()
    {
        KillSound.Play();
        yield return new WaitForSeconds(0.3F);
        levelMan.AntClicked();
        Destroy(gameObject);
    }
}
